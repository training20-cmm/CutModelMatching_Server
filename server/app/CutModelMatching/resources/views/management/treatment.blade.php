@extends("layouts.dashboard")

@section("dashboard-content")
<v-container>
    <v-row>
        <v-spacer></v-spacer>
        <v-col cols="8">
            <v-card>
                <v-card-title>施術内容</v-card-title>
                <v-card-text>
                    <v-simple-table>
                        <template v-slot:default>
                          <thead>
                            <tr>
                              <th>施術内容</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($treatmentList as $treatment)
                            <tr>
                              <td>{{$treatment->name}}</td>
                              <td>
                                <v-btn icon>
                                  <v-icon>mdi-delete</v-icon>
                                </v-btn>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </template>
                      </v-simple-table>
                      <v-divider></v-divider>
                      <v-card-actions>
                          <dialog-add-treatment />
                          <v-btn color="primary">追加</v-btn>
                      </v-card-actions>
                </v-card-text>
            </v-card>
        </v-col>
        <v-spacer></v-spacer>
    </v-row>
</v-container>
@endsection