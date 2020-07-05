<template>
    <v-card class="h-100">
        <v-navigation-drawer color="primary" dark permanent class="w-100 m-0">
            <v-list-item>
                <v-list-item-content>
                    <v-list-item-title class="title">CMM</v-list-item-title>
                </v-list-item-content>
            </v-list-item>

            <v-divider class="bg-white"></v-divider>

            <v-list dense nav>
                <div v-for="item in items" :key="item.title">
                    <v-list-group v-if="item.children" no-action>
                        <template v-slot:activator>
                            <v-list-item-content>
                                <v-list-item-title>{{
                                    item.title
                                }}</v-list-item-title>
                            </v-list-item-content>
                        </template>
                        <v-list-item
                            v-for="child in item.children"
                            :key="child.title"
                            :href="child.href"
                            link
                        >
                            <v-list-item-icon>
                                <v-icon>{{ child.icon }}</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>{{
                                    child.title
                                }}</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list-group>
                    <v-list-item v-else　:href="item.href" link>
                        <v-list-item-icon>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title>{{
                                item.title
                            }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </div>
            </v-list>
        </v-navigation-drawer>
    </v-card>
</template>

<script>
export default {
    name: "NavigationDrawer",
    data() {
        return {
            items: [
                {
                    title: "統計",
                    icon: "mdi-google-analytics",
                    href: "/dashboard/analytics",
                },
                {
                    title: "管理",
                    icon: "",
                    children: [
                        {
                            title: "施術内容",
                            icon: "mdi-format-list-bulleted-square",
                            href: "/dashboard/management/treatment",
                        },
                    ],
                },
            ],
        };
    },
};
</script>
