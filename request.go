package main

import (
	"crypto/tls"
	"crypto/x509"
	"fmt"
	"io"
	"io/ioutil"
	"log"
	"net/http"
	"net/url"
	"path"
	"path/filepath"
	"strings"

	"github.com/sk409/goconst"
)

type requestConfig struct {
	method    string
	urlString string
	params    map[string]string
}

func makeRequest(method, urlString string, params map[string]string) (*http.Request, error) {
	var body io.Reader
	if method == http.MethodGet {
		urlString += "?"
		for key, value := range params {
			urlString += fmt.Sprintf("%s=%s&", key, value)
		}
	} else {
		values := url.Values{}
		for key, value := range params {
			values.Set(key, value)
		}
		body = strings.NewReader(values.Encode())
	}
	request, err := http.NewRequest(method, urlString, body)
	if err != nil {
		return nil, err
	}
	request.Header.Set(goconst.HTTP_HEADER_CONTENT_TYPE, goconst.HTTP_HEADER_CONTENT_TYPE_URLENCODED)
	request.Header.Set("Authorization", "aK0SInONV2xw5OJ72XIMKkc71FdsO0XNATXFVKjXmGQ1oHqb5NpWc7GANqQO")
	return request, nil
}

func main() {
	ca, err := tls.LoadX509KeyPair(
		filepath.Join("/etc", "sdso", "ca", "server.crt"),
		filepath.Join("/etc", "sdso", "ca", "server.key"),
	)
	if err != nil {
		panic(err)
	}
	certificate, err := x509.ParseCertificate(ca.Certificate[0])
	if err != nil {
		panic(err)
	}
	certPool := x509.NewCertPool()
	certPool.AddCert(certificate)
	clientConfig := tls.Config{
		RootCAs: certPool,
	}
	proxyURL, err := url.Parse("http://localhost:4080")
	if err != nil {
		panic(err)
	}
	client := http.Client{
		Transport: &http.Transport{
			TLSClientConfig: &clientConfig,
			Proxy:           http.ProxyURL(proxyURL),
		},
	}
	targetOrigin := "http://192.168.3.2:8080"
	if err != nil {
		panic(err)
	}
	requestConfigs := []requestConfig{
		requestConfig{
			method:    http.MethodGet,
			urlString: targetOrigin + "/" + path.Join("api", "chat_rooms", "history"),
			params: map[string]string{
				"name":     "",
				"password": "",
			},
		},
	}
	for _, requestConfig := range requestConfigs {
		request, err := makeRequest(requestConfig.method, requestConfig.urlString, requestConfig.params)
		if err != nil {
			log.Println(err.Error())
			continue
		}
		log.Println("BEFORE DO")
		response, err := client.Do(request)
		b, err := ioutil.ReadAll(response.Body)
		log.Println(string(b))
		log.Println("AFTER DO")
		if err != nil {
			log.Println(err.Error())
			continue
		}
		defer response.Body.Close()
		// log.Println(response)
	}
}
