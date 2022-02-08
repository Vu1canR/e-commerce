<template>
    <div id="slider">
        <div class="buttons">
            
        </div>

            <!-- <div
                v-for="index in slides"
                v-if="index == active"
                :key="index"
            >
                Slide {{ index }}
                
            </div> -->
        <div class="slides">

            <div class="slide">
                <img src="/images/amd.jpg" alt="amd">
            </div>
            <div class="slide">
                <img src="/images/nvidia.jpg" alt="nvidia">
            </div>
            <div class="slide">
                <img src="/images/xboxsx.jpg" alt="xboxsx">
            </div>

        </div>


            <span
                class="prev"
                @click="move(-1)"
            >
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </span>
            <span
                class="next"
                @click="move(1)"
            >
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </span>
            <ul class="dots">
                <li 
                v-for="(dot, index) in slides"
                :key="index"
                :class="{'active': slideIndex - 1 === index}"
                @click="current(index)"
                ></li>
            </ul>

    <!-- <p v-bind="inConsole()"></p> -->
    </div>
</template>
<script>
export default {
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            slides: '',
            slideIndex: 1,
            
        }
    },

    methods: {

        
        move(n) {
            this.showSlide(this.slideIndex += n)
        },
        
        current(n){
            this.showSlide(this.slideIndex = n + 1)
        },

        showSlide(n){
  
            for (let index = 0; index < this.slides.length; index++) {
                this.slides[index].style.display = 'none';
            }

            if(n < 1) this.slideIndex = this.slides.length
            if(n > this.slides.length) this.slideIndex = 1

            this.slides[this.slideIndex-1].style.display = 'block';
              
        },
        inConsole(){
         
        }
        
    },

    created() {
        
    },
    mounted() {
        
        this.slides = document.getElementsByClassName("slide")
        this.slides[this.slideIndex-1].style.display = 'block';

        
    }
    
}
</script>