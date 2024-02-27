const messageElement = document.getElementById('messageOutput');
const inputMessage =document.getElementById('message_btn');
const formMessage =document.getElementById('form_message');


let url = window.location;
let newUrl = new URL(url);
let username = urlNew.searchParams.get('name');
inputMessage.addEventListener("submit", function(e){
    e.preventDefault();
    if(inputMessage.value != ''){

        axios({
            method: 'post',
            url: '/sendMessage',
            data:{
                username : username,
                message:messageElement.value,

            },
        })
    }

    window.SpeechRecognitionAlternative.channel('laravelChat').listen('chatting').listen('.chatting',(res)=>{
        console.log(res);
    });


})


















//
