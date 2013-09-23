       <aside id="sidebar" class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                     <h3 class="panel-title">Letter to Sarasota City Council</h3>
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="#">Morbi nec urna adipiscing, dignissim mi a, convallis lorem.</a></li>
                                        <li><a href="#">Phasellus facilisis orci vel purus iaculis accumsan.</a></li>
                                        <li><a href="#">Donec vel sem tincidunt, vehicula tortor a, faucibus dolor.</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                     <h3 class="panel-title">Fact Sheet</h3>
                                </div>
                                <div class="panel-body">
                                      <ul>
                                        <li><a href="#">Morbi nec </a></li>
                                        <li><a href="#">Phasellus facilisis</a></li>
                                        <li><a href="#">Donec vel sem</a></li>
                                        <li><a href="#">Vestibulum eleifend</a></li>
                                    </ul> 
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                     <h3 class="panel-title">Sign Up for Updates</h3>
                                </div>
                                <div class="panel-body">
                                   <form>
                                       <div class="input-group">
                                           <input type="text" class="form-control" placeholder="Email Address">
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm" type="button">Submit</button>
                                        </span>
                                      </div>
                                   </form>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                     <h3 class="panel-title">Follow Us on</h3>
                                </div>
                                <div class="panel-body">
                                    <ul class="social-network">
                                        <li><a href="#"><img src="images/facebook2.png" /></a></li>
                                        <li><a href="#"><img src="images/twitter2.png" /></a></li>
                                    </ul> 
                                </div>
                            </div>
                        </aside>

<aside id="sidebar" class="col-md-4">
    <?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar' ); ?>
    <?php endif; ?>                      
</aside>