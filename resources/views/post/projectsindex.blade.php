@extends('main')

@section('title','|Projektek')
@section('stylesheets')
    {!!Html::style('css/layouts/post_index.css')!!}
    {!!Html::style('css/layouts/post_index_responsive.css')!!}
@endsection

@section('content')

    @section('hometitle','Projektek')
        
    <div class="news">
		<div class="container">
			<div class="row">
				
				<!-- News Column -->

				<div class="col-lg-8">
					
					<div class="news_posts">
                        <!-- News Post -->
                        @foreach ($projects as $project)
						<div class="news_post">
							<div class="news_post_image">
								<img src="{{asset('/images/' . $project->image)}}" alt="">
							</div>
							<div class="news_post_top d-flex flex-column flex-sm-row">
								<div class="news_post_date_container">
									<div class="news_post_date d-flex flex-column align-items-center justify-content-center">
										<div>{{ date('j', strtotime($project->created_at)) }}</div>
										<div>{{ date('M', strtotime($project->created_at)) }}</div>
									</div>
								</div>
								<div class="news_post_title_container">
									<div class="news_post_title">
										<a href="{{ route('post.projectsingle', $project->slug) }}">{{ $project->title }}</a>
									</div>
									<div class="news_post_meta">
									
										<span class="news_post_comments"><a href="#"></a></span>
									</div>
								</div>
							</div>
							<div class="news_post_text">
								<p>{{ substr(strip_tags($project->body), 0, 250) }}{{ strlen(strip_tags($project->body)) > 250 ? '...' : "" }}</p>
							</div>
							<div class="news_post_button text-center trans_200">
								<a href="{{ route('post.projectsingle', $project->slug) }}">Tovább</a>
							</div>
                        </div>
                        @endforeach
					</div>

					<!-- Page Nav -->

					{!! $projects->links() !!}

				</div>

				<!-- Sidebar Column -->

				<div class="col-lg-4">
					<div class="sidebar">
							<a href="{{route('projects.create')}}" class="button button_color_1 text-center trans_200" role="button">Új projekt</a>

						<!-- Archives -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">
								<h3>Archives</h3>
							</div>
							<ul class="sidebar_list">
								<li class="sidebar_list_item"><a href="#">Design Courses</a></li>
								<li class="sidebar_list_item"><a href="#">All you need to know</a></li>
								<li class="sidebar_list_item"><a href="#">Uncategorized</a></li>
								<li class="sidebar_list_item"><a href="#">About Our Departments</a></li>
								<li class="sidebar_list_item"><a href="#">Choose the right course</a></li>
							</ul>
						</div>

						<!-- Latest Posts -->

						<div class="sidebar_section">
							<div class="sidebar_section_title">
								<h3>Latest posts</h3>
							</div>
							
							<div class="latest_posts">
								
								<!-- Latest Post -->
								<div class="latest_post">
									<div class="latest_post_image">
										<img src="images/latest_1.jpg" alt="https://unsplash.com/@dsmacinnes">
									</div>
									<div class="latest_post_title"><a href="news_post.html">Why do you need a qualification?</a></div>
									<div class="latest_post_meta">
										<span class="latest_post_author"><a href="#">By Christian Smith</a></span>
										<span>|</span>
										<span class="latest_post_comments"><a href="#">3 Comments</a></span>
									</div>
								</div>

								<!-- Latest Post -->
								<div class="latest_post">
									<div class="latest_post_image">
										<img src="images/latest_2.jpg" alt="https://unsplash.com/@erothermel">
									</div>
									<div class="latest_post_title"><a href="news_post.html">Why do you need a qualification?</a></div>
									<div class="latest_post_meta">
										<span class="latest_post_author"><a href="#">By Christian Smith</a></span>
										<span>|</span>
										<span class="latest_post_comments"><a href="#">3 Comments</a></span>
									</div>
								</div>

								<!-- Latest Post -->
								<div class="latest_post">
									<div class="latest_post_image">
										<img src="images/latest_3.jpg" alt="https://unsplash.com/@element5digital">
									</div>
									<div class="latest_post_title"><a href="news_post.html">Why do you need a qualification?</a></div>
									<div class="latest_post_meta">
										<span class="latest_post_author"><a href="#">By Christian Smith</a></span>
										<span>|</span>
										<span class="latest_post_comments"><a href="#">3 Comments</a></span>
									</div>
								</div>
								
							</div>
								
						</div>

						<!-- Tags -->

						<div class="sidebar_section">
							<div class="sidebar_section_title">
								<h3>Tags</h3>
							</div>
							<div class="tags d-flex flex-row flex-wrap">
								<div class="tag"><a href="#">Course</a></div>
								<div class="tag"><a href="#">Design</a></div>
								<div class="tag"><a href="#">FAQ</a></div>
								<div class="tag"><a href="#">Teachers</a></div>
								<div class="tag"><a href="#">School</a></div>
								<div class="tag"><a href="#">Graduate</a></div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
    
@endsection