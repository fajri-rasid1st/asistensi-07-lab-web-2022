@extends('layout.admin');
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
        <div class="col">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <!-- /.col -->
          <div class="col">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,021</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Articles</span>
                <span class="info-box-number">21,042</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Most Liked!</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">ARTICLE 1</h5>
                            <p class="card-text">Schools in Finland are small, at least for international standards. More than in any other country teachers are ready to prepare children for life. In some cases they know every pupil in their school and can adjust to them.</p>
                          </div>
                          <div class="card-footer">
                            <small class="text-muted">Last updated 20 mins ago</small>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Article 2</h5>
                            <p class="card-text">Class activity and learning process are now depended on online method because of the pandemic. Unfortunately, many parties are unsatisfied with this learning process. Especially the parents whose children are still in the elementary school. There are some reasons that make them feel this way. First, students and parents are not ready with the sudden changes that happened. Second, not all families can provide their children with the devices for online learning.</p>
                          </div>
                          <div class="card-footer">
                            <small class="text-muted">Last updated 21 mins ago</small>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Article 3</h5>
                            <p class="card-text">For many years the school system in Finland has been very successful. In the PISA survey, which compares reading, math and science knowledge of 15 year olds around the world, shows Finland is not only the top European country but also competes with Asian giants like China, Singapore and South Korea. But what makes the educational system in this small country so different from others in the western world?</p>
                          </div>
                          <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Most Commented!</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">ARTICLE 1</h5>
                            <p class="card-text">When you use a home air conditioner, do not forget to take care of on a regular basis. Because when AC is not treated regularly and carefully, it will have a bad air and becomes a place to spread the disease. The dirty AC can store a variety of viruses and bacteria that continuously spread throughout the room.</p>
                          </div>
                          <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Article 2</h5>
                            <p class="card-text">An ideal condition for public health is one of the most important thing in life. Not only the government, every sector and community itself should be helpful in improving public level of health. First, people who are aware of the importance of health will help improve health levels. They should encourage others to adopt a healthy lifestyle in order to get a good health in long term. Then, the government should provided an adequate facilities and skilled workforce in health sector. This two role are alse needed to have a good cooperation on the process to improve the level of public health. In that way, people can live more comfortably and prosperously.</p>
                          </div>
                          <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Article 3</h5>
                            <p class="card-text">Flood is not just a natural disaster in Indonesia, its a habit.During rainy season, some big cities such as Jakarta and Bekasi will likely drown. Lately, this phenomena happens in several areas of Indonesia. The main cause of this situation is the lack of green area. The land and trees are replaced by buildings so nothing can absorb rain waters. In order to prevent worse flood disasters, government should make better actions.</p>
                          </div>
                          <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Most Read!</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">ARTICLE 1</h5>
                            <p class="card-text">The International Space Station is a large satellite that orbits the Earth at an altitude of between 300 and 460 km. It travels at a speed of 27,000 km an hour (17 000 mph).</p>
                          </div>
                          <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Article 2</h5>
                            <p class="card-text">The first part of the ISS was launched into orbit by the Russian Soyuz spacecraft in 1998. Since then Russian and American spacecraft have been delivering modules to expand the space station.</p>
                          </div>
                          <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Article 3</h5>
                            <p class="card-text">Until the 1960s Finlands school system had been influenced largely by its neighbor, the Soviet Union. Most students left school after six years; some went on to private school. Only the wealthy ones got a better education.</p>
                          </div>
                          <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection