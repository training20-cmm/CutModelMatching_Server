<template>
    <v-dialog v-model="visible" width="50%">
        <template #activator="{on}">
            <v-btn color="primary" v-on="on">追加</v-btn>
        </template>
        <v-card>
            <v-card-title>
                新規施術内容追加
            </v-card-title>
            <v-card-text>
                <v-form action="/treatment" method="post">
                    <v-text-field
                        v-model="name"
                        label="名前"
                        required
                    ></v-text-field>
                </v-form>
            </v-card-text>
            <v-divider></v-divider>
            <v-card-actions>
                <v-btn color="primary mx-auto" :loading="loading" @click="store"
                    >追加</v-btn
                >
            </v-card-actions>
        </v-card>
        <v-snackbar :timeout="3000" v-model="snackbar">
            <span>施術内容を追加しました</span>
            <template v-slot:action="{ attrs }">
                <v-btn
                    color="white"
                    icon
                    v-bind="attrs"
                    @click="snackbar = false"
                >
                    <v-icon>mdi-close</v-icon>
                </v-btn>
            </template>
        </v-snackbar>
    </v-dialog>
</template>

<script>
import ajax from "../ajax";
export default {
    name: "DialogAddTreatment",
    data() {
        return {
            visible: false,
            loading: false,
            name: "",
            snackbar: false
        };
    },
    methods: {
        store() {
            const data = {
                name: this.name
            };
            this.loading = true;
            ajax.post("/menu_treatment", data).then(response => {
                this.loading = false;
                this.snackbar = true;
                console.log(response);
            });
        }
    }
};
</script>
