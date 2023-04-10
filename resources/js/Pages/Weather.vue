<script setup>
import BaseLayout from '@/Layouts/Base.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>
<template>
    <Head title="Weather"/>

    <BaseLayout>
        <div class="p-8">
            <ul>
                <li   v-for="(value, key, index) in this.weather.current_weather" :key="index"> 
                {{ key }}: {{ value }}
                </li>
            </ul>
        </div>
    </BaseLayout>
</template>
<script>

    import axios from 'axios';

    export default {

        data(){
            return{
                weather: {},
            }
        },
        mounted(){

            this.loadWeather() 
        },
        methods:{

            loadWeather(){
            
                axios.get('/api/weather').then(res => {

                    this.weather = res.data
                
                }).catch(err => { 
                    console.log(err.response) 
                }) 
            }
        }
    }

</script>