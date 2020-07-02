@extends("layouts.app")

@section("app-content")
<v-container fluid class="h-100 pa-0">
    <v-row no-gutters class="h-100">
        <v-col cols="3">
            <navigation-drawer></navigation-drawer>
        </v-col>
        <v-col>
            @yield("dashboard-content")
        </v-col>
    </v-row>
</v-container>
@endsection