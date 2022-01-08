
<template>
 <section class="whats-news-area pt-50 pb-20  wow fadeInUp" id="kategori" data-wow-duration="1s" data-wow-delay="0.3s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row d-flex justify-content-between">
            <div class="col-lg-3 col-md-3">
              <div class="section-tittle mb-30">
                <h3>Kategori Berita</h3>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-xl-9">
              <div class="properties__button">
                <!--Nav Button  -->
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                      aria-controls="nav-home" aria-selected="true">Olahraga</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                      aria-controls="nav-profile" aria-selected="false">Kesehatan</a>
                    <a class="nav-item nav-link" id="nav-Kriminal-tab" data-toggle="tab" href="#nav-Kriminal" role="tab"
                      aria-controls="nav-Kriminal" aria-selected="false">Kriminal</a>
                    <a class="nav-item nav-link" id="nav-Politik-tab" data-toggle="tab" href="#nav-Politik" role="tab" aria-controls="nav-Politik" aria-selected="false">Politik</a>
                    <a class="nav-item nav-link" id="nav-Bisnis-tab" data-toggle="tab" href="#nav-Bisnis" role="tab"
                      aria-controls="nav-Bisnis" aria-selected="false">Bisnis</a>

                  </div>
                </nav>
                <!--End Nav Button  -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <!-- Nav Card -->
              <div class="tab-content" id="nav-tabContent">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <div class="trending-bottom">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="single-bottom mb-35">
                          <div class="trend-bottom-img mb-30">
                            <img src="" alt="">
                          </div>
                          <div class="trend-bottom-cap">
                            <span class="color1">Olahraga</span>
                            <h4 style="margin-top: 10px;"><a href="details.html">Indonesia mendapatkan sanksi</a></h4>
                            <p style="margin-top: 5px; font-weight: bold;">24-Des-2021 </p>
                            <p style="margin-top: -5px;">Lorem, ipsum dolor sit amet consectetur adipisicing elit... </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="single-bottom mb-35">
                          <div class="trend-bottom-img mb-30">
                            <img src="" alt="">
                          </div>
                          <div class="trend-bottom-cap">
                            <span class="color1">Olahraga</span>
                            <h4 style="margin-top: 10px;"><a href="details.html">Indonesia mendapatkan sanksi</a></h4>
                            <p style="margin-top: 5px; font-weight: bold;">24-Des-2021 </p>
                            <p style="margin-top: -5px;">Lorem, ipsum dolor sit amet consectetur adipisicing elit... </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="single-bottom mb-35">
                          <div class="trend-bottom-img mb-30">
                            <img src="" alt="">
                          </div>
                          <div class="trend-bottom-cap">
                            <span class="color1">Olahraga</span>
                            <h4 style="margin-top: 10px;"><a href="details.html">Indonesia mendapatkan sanksi</a></h4>
                            <p style="margin-top: 5px; font-weight: bold;">24-Des-2021 </p>
                            <p style="margin-top: -5px;">Lorem, ipsum dolor sit amet consectetur adipisicing elit... </p>
                          </div>
                        </div>
                      </div>
                    </div>
                   
                  </div>
                </div>
              
                  <div class="trending-tittle1 border-first-button">
                    <strong><a href=""> Selengkapnya</a></strong>
                 </div>
                </div>
              </div>
            </div>
            <!-- End Nav Card -->
          </div>
        </div>
      </div>

    </div>
  </section>
</template>

<script>
import moment from 'moment';

        export default {
        kelas: "",
        data(){
            return{
                notification: []
        }
        },
        created(){
           
            
        },
        methods: {
            getDateFormat(date){
                return moment(String(date)).format('MM/DD/YYYY hh:mm')
            },
            fetchCategory(){
                axios.get('').then(response=>{
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
