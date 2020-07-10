<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <select class="custom-select" v-model="key" @change="getUsers(key)">
                    <option selected>Open this select menu</option>
                    <option v-for="country in countries" :value="country.id">
                        {{country.name}}
                    </option>
                </select>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Company</th>
                        <th class="text-center" scope="col">Users</th>
                        <th class="text-center" scope="col">Invitation date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users">
                        <th scope="row">1</th>
                        <td>{{user.name}}</td>
                        <td>
                            <ul v-for="u in user.users">
                                <li>{{u.name}} || {{ u.pivot.created_at | moment }}</li>
                            </ul>
                        </td>
                        <td>

                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
import moment from 'moment'
import axios from 'axios'
export default {
    data() {
        return {
            countries: '',
            users: '',
            key: ''
        }
    },
    methods:{
        getCountries(){
            axios.get('/getCountries').then(response => {
                this.countries = response.data;
                }).catch((errors) => {
                    console.log(errors)
                })
        },
        getUsers(country) {
            axios.post('/getUsers', {'country': country}).then(response => {
                this.users = response.data;
                }).catch((errors) => {
                    console.log(errors)
            })
        },
        timeToIso($date) {
            return format($date, 'MM/DD/YYYY');
        }
    },
    filters: {
        moment(date) {
            return moment(date).format('MMMM Do YYYY');
        }
    },
    mounted(){
        this.getCountries();
    }
}
</script>
