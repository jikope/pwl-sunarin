
<template>
<div class="container">
    <div class="mt-5 card shadow p-3">
    <h4 class="m-3">Notifikasi</h4>
    <ul style="list-style-type: none;">
        <li v-for="(message, index) in notification" :key="index" >
            <a v-bind:class="classGenerate(message.isRead)"  v-on:click="readNotif(message.id, message.url)">
            <p> <strong>{{message.title}}  </strong><small class="mr-5">{{getDateFormat(message.created_at)}}</small></p>
            <p>{{message.url}}</p>
            <p>{{message.message}}</p>
            </a>
            
        </li>
    </ul>
    </div>
</div>
</template>

<script>
import moment from 'moment';

        export default {
      
        props: ['user'],
        kelas: "",
        data(){
            return{
                notification: []
        }
        },
        created(){
            this.fetchMessages();
            
            Echo.channel('notif'+this.user.id).listen('NotifSentEvent',(event)=>{
                this.notification.unshift({
                    title: event.message.title,
                    message: event.message.message,
                    created_at: event.message.created_at,
                    url: event.message.url,
                    isRead:event.message.isRead,
                    $id:event.message.id
                    })
            });
            
        },
        methods: {
            getDateFormat(date){
                return moment(String(date)).format('MM/DD/YYYY hh:mm')
            },
            fetchMessages(){
                axios.get('notification').then(response=>{
                    this.notification = response.data;
                })
            },
            getUri(uri){
                return uri;
            },
            classGenerate(isRead){
                
                if(isRead=="0"){
                    this.kelas ="bg-primary text-white"
                }
                return "card border p-3 "+this.kelas
            },
            readNotif(id, url){
                 axios.get('/notification/'+id+'/read').then(response=>{
                    window.location.href = url
                })
                
            }
            
        },
    }
    
</script>
