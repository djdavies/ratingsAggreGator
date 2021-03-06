@extends('master')

@section('style')
    {{ HTML::style("/css/meet-the-team.css") }}
    {{ HTML::style( '/css/bootstrap-social.css' ) }}
@stop

@section('content')
    <div class="container">
        <!-- hacked and inelegant -->
        <div class="row placeholders page-content">
            <h1>The Ratingator Team</h1>
            <div class="col-xs-6 col-sm-3 placeholder">
                <img src="https://avatars0.githubusercontent.com/u/310636?v=3&s=460" class="img-responsive" alt="Generic placeholder thumbnail">
                <h4>Jake</h4>
                <p class="text-muted">an organism that converts caffeine to code. also sysadmin.</p>
                <div class="connect-icons">
                    <a 
                        target="_blank" 
                        href="https://www.facebook.com/jdavies.thfc" 
                        class="btn btn-social-icon btn-facebook"
                    >
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a 
                        target="_blank" 
                        href="https://www.linkedin.com/pub/daniel-jake-davies/4b/301/58" 
                        class="btn btn-social-icon btn-linkedin"
                    >
                      <i class="fa fa-linkedin"></i>
                    </a>
                    <a 
                        target="_blank" 
                        href="https://github.com/djdavies" 
                        class="btn btn-social-icon btn-github"
                    >
                        <i class="fa fa-github"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-xs-6 col-sm-3 placeholder">
                <img src="https://avatars0.githubusercontent.com/u/5638316?v=3&s=460" class="img-responsive" alt="Generic placeholder thumbnail">
                <h4>Ryan</h4>
                <p class="text-muted">makes things pretty. powered by biscuits.</p>
                <div class="connect-icons" align="center">
                    <a 
                        target="_blank" 
                        href="https://www.facebook.com/ryan.gibbs.11?fref=ts" 
                        class="btn btn-social-icon btn-facebook"
                    >
                      <i class="fa fa-facebook"></i>
                    </a>
                    <a 
                        target="_blank" 
                        href="https://www.linkedin.com/in/ryangibbs11" 
                        class="btn btn-social-icon btn-linkedin"
                    >
                      <i class="fa fa-linkedin"></i>
                    </a>
                    <a 
                        target="_blank" 
                        href="https://github.com/8bitJunk" 
                        class="btn btn-social-icon btn-github"
                    >
                        <i class="fa fa-github"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-xs-6 col-sm-3 placeholder">
                <img src="https://avatars0.githubusercontent.com/u/9447746?v=3&s=460" class="img-responsive" alt="Generic placeholder thumbnail">
                <h4>Sam</h4>
                <p class="text-muted">will code for new laptop.</p>
                <div class="connect-icons">
                    <a 
                        target="_blank" 
                        href="https://www.facebook.com/sam.reily.376?fref=ts" 
                        class="btn btn-social-icon btn-facebook"
                    >
                      <i class="fa fa-facebook"></i>
                    </a>
                    <a 
                        target="_blank" 
                        href="https://github.com/sreilly1" 
                        class="btn btn-social-icon btn-github"
                    >
                        <i class="fa fa-github"></i>
                    </a>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
                <img src="https://avatars0.githubusercontent.com/u/5989435?v=3&s=460" class="img-responsive" alt="Generic placeholder thumbnail">
                <h4>Vanessa</h4>
                <p class="text-muted">bakes and codes. mainly the latter.</p>
                <div class="connect-icons">
                    <a 
                        target="_blank" 
                        href="https://www.facebook.com/vanessa.yau.52" 
                        class="btn btn-social-icon btn-facebook"
                    >
                      <i class="fa fa-facebook"></i>
                    </a>
                    <a 
                        target="_blank" 
                        href="https://www.linkedin.com/pub/vanessa-yau/7a/554/2b5" 
                        class="btn btn-social-icon btn-linkedin"
                    >
                      <i class="fa fa-linkedin"></i>
                    </a>
                    <a 
                        target="_blank" 
                        href="https://github.com/vyau987" 
                        class="btn btn-github btn-social-icon"
                    >
                        <i class="fa fa-github"></i>
                    </a>
                </div>
            </div>
          </div>
    </div>
@stop