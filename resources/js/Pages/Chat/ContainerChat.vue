<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import InputMessage from './InputMessage.vue';
import MessagesContainer from './MessagesContainer.vue';


let chatRooms= [];
let currentRoom =  [];
let messages = [];

const getRooms = () => {
    axios.get('/chat/rooms')
        .then(response => {
            chatRooms = response.data;
            setRoom(response.data[0]);
        })
        .catch(error => {
            console.error(error)
        })   
}

const setRoom = (room) =>{
        currentRoom = room;
        getMessages()
}

const getMessages = () =>{
    axios.get('/chat/room/' + currentRoom.id + '/messages')
        .then(response =>{
            messages = response.data;
        })
        .catch(error => {
            console.error(error)
        })
}

getRooms();
     

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <MessagesContainer/>
                    <InputMessage :room = "currentRoom"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
