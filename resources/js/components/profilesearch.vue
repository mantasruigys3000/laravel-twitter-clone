<template>
<div>
    <div>
        <input type="text" v-model="search" @change="typed">
        <p>{{this.searchLen}}</p>
        <div v-for="profile in this.profiles">
            <p>{{profile.username}}</p>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: "profilesearch",
    data(){
        return{
            search:'',
            profiles: [],

        }
    },
    methods:{
        typed(){


        }

    },



    computed:{
        searchLen(){
            return this.search.length;

        }


    },


    watch:{
        search: function(){
            if(this.searchLen > 0){
                axios.post('users/profiles',{'search': this.search}).then(rsp=>{
                    console.log(rsp.data);
                    this.profiles = rsp.data.data;

                })
            }
        }
    }
}
</script>

<style scoped>

</style>
