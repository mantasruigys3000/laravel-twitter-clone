<template>
    <form @submit.prevent="uploadImage()" method="post" enctype="multipart/form-data">
        <input type="file" name="image" @change="selectedFile">
        <input type="submit">
    </form>
</template>

<script>
export default {
    name: "upload_image",
    data(){
        return{
            file: {
                img: null
            }

        }
    }
    ,
    methods:{
     uploadImage(){
         let data = new FormData();
         data.append('name','image')
         data.append('file',this.file.img);


         const headers = {
             'content-type': 'multipart/form-data'
         }

        axios.post('/i/uploadImg',data,{headers:headers}).then(rsp=>{
            console.log(rsp);

        });


     },
        selectedFile(event){



            this.file.img = event.target.files[0];


        },
    },

}
</script>

