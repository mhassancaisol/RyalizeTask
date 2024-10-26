<template>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users.data" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.created_at }}</td>
                </tr>
            </tbody>
        </table>

        <button v-if="users.prev_page_url" @click="loadUsers(users.prev_page_url)">Previous</button>
        <button v-if="users.next_page_url" @click="loadUsers(users.next_page_url)">Next</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            users: {},
        };
    },
    mounted() {
        this.loadUsers('/api/users');
    },
    methods: {
        loadUsers(url) {
            axios.get(url)
                .then(response => {
                    this.users = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
}
</script>

<style>
/* Add your styles here */
</style>
