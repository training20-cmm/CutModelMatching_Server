@extends("layouts.dashboard")

@section("dashboard-content")
<v-container>
    <v-row>
        <v-spacer></v-spacer>
        <v-col cols="8">
            <v-card>
                <v-card-title>NGワード</v-card-title>
                <v-card-text>
                    <v-simple-table>
                        <template v-slot:default>
                          <thead>
                            <tr>
                              <th class="text-left">Text</th>
                              <th class="text-left">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>
                                  <v-btn icon>
                                      <v-icon>mdi-delete</v-icon>
                                  </v-btn>
                              </td>
                            </tr>
                          </tbody>
                        </template>
                      </v-simple-table>
                      <v-divider></v-divider>
                      <v-card-actions>
                          <v-btn color="primary">追加</v-btn>
                      </v-card-actions>
                </v-card-text>
            </v-card>
        </v-col>
        <v-spacer></v-spacer>
    </v-row>
</v-container>
@endsection