<template>
    <div class="relative h-10 m-1">
        <div style="border-top: 1px solid #e6e6e6" class="grid grid-cols-6">
            <input
                type="text"
                v-model="message"
                @keyup.enter="sendMessages()"
                placeholder="Text something..."
                class="col-spam-5 outline-none p1"
            />
            <button
                @click="sendMessages()"
                class="place-selft-end bg-gray-500 hover:blue-700 p-1 mt-1 rounded text-white"
            >
                Send...
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['room'],
        data: function (room) {
            return{
                message: ''
            }
        },
        methods:{
            sendMessages(){
                if (this.message == '') {
                    return;
                }else{
                    axios.post('/chat/room/' + this.room.id + '/message',{
                        message: this.message
                    })
                    .then((result) => {
                        if (response.status == 201) {
                            this.message = '';
                            this.$emit('messagesend')
                        } 
                    }).catch((err) => {
                        console.log(err);
                    });
                }
            }
        }
    }
</script>
