<script setup>
import BaseLayout from '@/Layouts/Base.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>
<template>
    <Head title="Users" />

    <BaseLayout>

        <div class="p-8">
  
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">Name</th>
                            <th scope="col" class="px-6 py-4">Email</th>    
                            <th scope="col" class="px-6 py-4">Lessuns</th>                   
                            <th scope="col" class="px-6 py-4">Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600"                     
                                v-for="(user, index) in this.users" :key="index">
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ index }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ user.name }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ user.email }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ user.lessons_count }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ user.progress }} %</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                <nav>
                    <ul class="list-style-none flex">
                        <li v-for="(link, index) in this.paginate.links" :key="index">
                            <a class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 hover:bg-neutral-100" v-on:click="paginateAct( link.url )">
                                {{ link.label }}
                            </a>
                        </li>                        
                    </ul>
                </nav>
            </div>

        </div>
    </BaseLayout>
</template>
<script>
import axios from 'axios';

export default {

    data(){
        return{
            users: {},
            paginate: {}
        }
    },
    mounted(){

        this.loadUsers()       
    },
    methods:{

        loadUsers(page=1){
    
            let url = '/api/students/progress?page=' + page

            axios.get(url).then(res => {

                this.users = res.data.data
                this.paginate = res.data.meta
           
            }).catch(err => { 
                console.log(err.response) 
            })                
        },
        paginateAct(link){

            if(link !== null){
                
                let page = link.split('=')[1];
                this.loadUsers(page)
            }                
        }
            
    }
}

</script>