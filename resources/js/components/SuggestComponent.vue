
<template>
 <section class="whats-news-area pt-50 pb-20  wow fadeInUp" id="kategori" data-wow-duration="1s" data-wow-delay="0.3s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="mb-3">Rekomendasi</h2>
          <div class="row">
            <div class="col-12">
              <!-- Nav Card -->
              <div class="tab-content" id="nav-tabContent">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <div class="trending-bottom">
                    <div class="row" >
                      <div class="col-lg-4" v-for="(item, index) in news" :key="index">
                        <div class="single-bottom mb-35">
                          <div class="trend-bottom-img mb-30">
                            <img v-bind:src="getUri(item.image)" alt="">
                          </div>
                          <div class="trend-bottom-cap">
                            <span class="color1">{{item.category}}</span>
                            <h4 style="margin-top: 10px;"><a v-bind:href="getUri('latest/'+item.id)">{{item.title}}</a></h4>
                            <p style="margin-top: 5px; font-weight: bold;">{{getDateFormat(item.date)}} </p>
                            <p style="margin-top: -5px;">{{stripHtml(item.content)}} </p>
                          </div>
                        </div>
                      </div>
                      
                     
                    </div>
                   
                  </div>
                </div>
              
                  <div class="trending-tittle1 border-first-button">
                    <strong><a v-bind:href="getUri('/category/'+categorySelected)"> Selengkapnya</a></strong>
                 </div>
                </div>
              </div>
            </div>
            <!-- End Nav Card -->
          </div>
        </div>
      </div>

    
  </section>
</template>

<script>
import moment from 'moment';

        export default {
        
        data(){
            return{
                news: [],
                categories:[],
                categorySelected: "sport",
        }
        },
        created(){
           this.fetchNews();
           this.fetchCategory();

            
        },
        methods: {
            getDateFormat(date){
                return moment(String(date)).format('MM-ddd-YYYY ')
            },
            fetchNews(){
                axios.get('/suggest/').then(response=>{
                    this.news = response.data;
                })
            },
            fetchCategory(){
                axios.get('categories').then(response=>{
                    this.categories = response.data;
                })
            },
            getUri(uri){
                return uri;
            },
            
            readNews(id, url){
                 axios.post('/detail/'+id+'/read').then(response=>{
                    window.location.href = url
                })
                
            },
             stripHtml(html){
                var div = document.createElement("div");
                div.innerHTML = html;
                var text = div.textContent || div.innerText || ""; 
                return text.substring(0,100)+"..."
            },
            changeSelected(category){
              this.categorySelected = category;
              this.fetchNews()
            }
            
        },
    }
    
</script>
