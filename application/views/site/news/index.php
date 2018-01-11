    <!-- page header
    ================================================== -->
    <section class="page-header page-hero" style="background-image:url(<?php echo base_url();?>assets/hola/images/blog/blog-bg-01.jpg)">

        <div class="row page-header__content">
            <article class="col-full">

                <div class="page-header__info">
                    <div class="page-header__cat">
                        <a href="#0">Branding</a><a href="#0">Design</a>
                    </div>
                    <div class="page-header__date">
                        Sept 16, 2017
                    </div>
                </div>
                
                <h1 class="page-header__title">
                    <a href="#0" title="">
                        The 10 Golden Rules of Clean Simple Design.
                    </a>
                </h1>
                <p>Pellentesque in ipsum id orci porta dapibus amet dui. Ad id deserunt ratione autem eius et minima ut et. Nihil sed quis velit aut enim aliquam. Quas non ad sint eveniet voluptatem est iure...</p>
                <p>
                    <a href="#0" class="btn btn--stroke page-header__btn">Read More</a>
                </p>
            </article>
        </div>

    </section> <!-- end page-header -->

    <!-- blog
    ================================================== -->
    <section class="blog-content-wrap">

        <div class="row blog-content">
            <div class="col-full">

                <div class="blog-list block-1-2 block-tab-full">


				<?php foreach ($news as $news_item): ?>

				        <article class="col-block">
				            
				            <div class="blog-date">
				                <a href="blog-single.html"><?php echo date("F j, Y", strtotime($news_item['update_time'])); ?></a>
				            </div>  
				            
				            <h2 class="h01"><a href="<?php echo base_url('news/'.$news_item['slug']); ?>"><?php echo $news_item['title']; ?></a></h2>
				            <p>
								<?php 

									$string = strip_tags($news_item['content']);
									if(strlen($string) > 500){
										//truncate string
										$stringCut = substr($string, 0, 500);
										//make sure it ends in a word so assassinate
										$string = substr($stringCut, 0, strrpos($stringCut, ' '))."...";
									}

									echo $string; 

								?>
								<a href="<?php echo base_url('news/'.$news_item['slug']); ?>">Read More</a>								
				            </p>
							
				            <div class="blog-cat">
				                <a href="blog.html">Photography</a>
				            </div>

				        </article>

				<?php endforeach; ?>

                </div> <!-- end blog-list -->

            </div> <!-- end col-full -->
        </div> <!-- end blog-content -->

        <div class="row blog-entries-nav">
            <div class="col-full">
		        <?php echo $pages; ?>
            </div>
        </div>


    </section> <!-- end blog-content-wrap -->

<h2><?php echo $title; ?></h2>