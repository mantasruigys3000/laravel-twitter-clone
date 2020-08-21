<template>
<div>
    <div>
        <input @keyup.enter="gotoSearch" class="w-40 text-black" type="text" v-model="search" placeholder="search">

        <div class=" absolute overflow-scroll h-32 bg-red-500 w-40" v-if="searchLen > 0" >
            <div  class=" relative " v-for="profile in this.profiles" >
                <img class=" inline-block w-8 h-8 rounded-full" :src="profile.profile_picture" alt="">
                <router-link class="inline-block bg-red-500" :to=" '/profile/' + profile.username ">{{profile.username}}</router-link>
            </div>
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
        gotoSearch(){

                console.log('enter hit ');
                this.$router.push({name: 'search',params:{q:this.search}});
                this.$router.go();
                

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
                axios.post('/users/profiles',{'search': this.search}).then(rsp=>{
                    console.log(rsp.data);
                    this.profiles = rsp.data.data;

                })
            }
        }
    }
}
</script>
