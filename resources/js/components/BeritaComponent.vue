<template>
      <div class="row">
          <div class="col-lg-8">
            <!-- Trending Top -->
            <div class="trending-top mb-30">
              <div class="trend-top-img">
                <div id="demo" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                  </ul>

                  <!-- The slideshow -->
                  <div class="carousel-inner">
                      
                    <div class="carousel-item" v-for="(item, index) in caraosel" :key="index" v-if="index<3" v-bind:class="isActive(index)">
                      <img v-bind:src="getUri(item.image)" alt=""> <!-- gambar ada di style.css cuy cari ae carousel item -->
                      <div class="trend-top-cap" style="z-index: 1;">
                        <span>{{item.category}}</span>
                        <h2 id="siniaja"><a v-bind:href="getUri('latest/'+item.id)">{{item.title}}</a></h2>
                      </div>
                    </div>
               
                  </div>


                  <!-- Left and right controls -->
                  <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                  </a>
                  <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                  </a>
                </div>
              </div>
            </div>
            <!-- Trending Bottom -->
            <div class="trending-bottom">
              <div class="row">
                <div class="col-lg-4" v-for="(item, index) in caraosel" :key="index">
                    <div v-if="index > 2 && index<6">
                  <div class="single-bottom mb-35">
                    <div class="trend-bottom-img mb-30">
                      <img v-bind:src="getUri(item.image)" alt="">
                    </div>
                    <div class="trend-bottom-cap">
                      <span class="color1">{{item.category}}</span>
                      <h4><a v-bind:href="getUri('latest/'+item.id)">{{item.title}}</a></h4>
                      <p style="margin-top: 5px; font-weight: bold;">{{getDateFormat(item.date)}}</p>
                      <p style="margin-top: -5px;">{{stripHtml(item.content)}} </p>
                    </div>
                  </div>
                </div>
                </div>
                
               
              </div>
            </div>
          </div>


          <!-- Riht content -->
          <div class="col-lg-4">
            <div  v-for="(item, index) in caraosel" :key="index">
            <div v-if="index>5" class="trand-right-single d-flex">
              
                <div class="trand-right-img">
                <img v-bind:src="getUri(item.image)" alt="">
              </div>
              <div class="trand-right-cap">
                <span class="color1">{{item.category}}</span>
                <h4><a v-bind:href="getUri('latest/'+item.id)">{{item.title}}</a></h4>
                <p style="margin-top: 5px; font-weight: bold;">{{getDateFormat(item.date)}} </p>
                <p style="margin-top: -5px;">{{stripHtml(item.content)}} </p>

              </div>
            
            </div>
            
        </div>
          </div>
          <div class="trending-tittle1 border-first-button">
             <strong><a v-bind:href="getUri('berita')"> Selengkapnya</a></strong>
          </div>
        </div>
</template>

<script>
import moment from 'moment';
        export default {
        
        data(){
            return{
                caraosel: [],
                left:[],
                right: [],
                i:0,
        }
        },
        created(){
           this.fetchNews();
           
            
        },
        methods: {
            getDateFormat(date){
                return moment(String(date)).format('MM-ddd-YYYY ')
            },
            fetchNews(){
                axios.get('news').then(response=>{
                    
                    this.caraosel=response.data
                    
                })
            },
            fetchCategory(){
                axios.get('categories').then(response=>{
                    this.caraosel = response.data;
                })
            },
            getUri(uri){
                return uri;
            },
            isActive(index){
                if(index==0){
                    return "active"
                }
                return ""
            },
            readNews(id, url){
                 axios.get('/detail/'+id+'/read').then(response=>{
                    window.location.href = url
                })
                
            },
             stripHtml(html){
                var div = document.createElement("div");
                div.innerHTML = html;
                var text = div.textContent || div.innerText || ""; 
                return text.substring(0,60)+"..."
            },
            changeSelected(category){
              this.categorySelected = category;
              this.fetchNews()
            }
            
        },
    }
    
</script>