<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>QUIZZ ENLIGNE</title>
    <!--<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Averia+Gruesa+Libre">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo e(asset('fontawesome-free-5.15.1-web/css/all.css')); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md fixed-top bg-info" id="mainnav">
        <div class="container-fluid"><a class="navbar-brand" href="/home" style="font-size: 32px;"><span style="color: rgba(251,0,0,0.9);">E-</span>Learning</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo e(url('/home')); ?>" style="font-size: 13px;color: rgba(255,0,0,0.5);"><strong>Acceuil</strong></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo e(url('home/mesCours')); ?>" style="font-size: 13px;"><strong>MES COURS</strong></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="font-size: 13px;"><strong>DECONNEXUON</strong></a></li>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                </ul>
        </div>
        </div>
    </nav>
    <section style="margin-top: 103px;">
        <?php echo $__env->yieldContent('content'); ?>
    </section>
    <div class="footer-dark" style="margin-top: 23px;">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Business Intelligence Soltutions</h3>
                        <p>B.I.S. est une société spécialisée dans la mise en place des solutions d'aide à la décision, Développement de logiciel de gestion ,Assistance, Conseil et Formation, Accompagnement et mise en place du Système Management Qualité Audit Qualité.</p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">Business Intelligence Soltutions</p>
            </div>
        </footer>
    </div>
   <!-- <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script> 
    
</body>

</html>

<style>
body {
    /*margin: 5px 20px;*/
    background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iNiIgaGVpZ2h0PSI2Ij4KPHJlY3Qgd2lkdGg9IjYiIGhlaWdodD0iNiIgZmlsbD0iI2VlZWVlZSI+PC9yZWN0Pgo8ZyBpZD0iYyI+CjxyZWN0IHdpZHRoPSIzIiBoZWlnaHQ9IjMiIGZpbGw9IiNlNmU2ZTYiPjwvcmVjdD4KPHJlY3QgeT0iMSIgd2lkdGg9IjMiIGhlaWdodD0iMiIgZmlsbD0iI2Q4ZDhkOCI+PC9yZWN0Pgo8L2c+Cjx1c2UgeGxpbms6aHJlZj0iI2MiIHg9IjMiIHk9IjMiPjwvdXNlPgo8L3N2Zz4=");
    /*font-family: 'Open Sans'; */
    /*font-weight: 300; */
}
.footer-dark {
  padding: 50px 0;
  color: #f0f9ff;
  background-color: #282d32;
}

.footer-dark h3 {
  margin-top: 0;
  margin-bottom: 12px;
  font-weight: bold;
  font-size: 16px;
}

.footer-dark ul {
  padding: 0;
  list-style: none;
  line-height: 1.6;
  font-size: 14px;
  margin-bottom: 0;
}

.footer-dark ul a {
  color: inherit;
  text-decoration: none;
  opacity: 0.6;
}

.footer-dark ul a:hover {
  opacity: 0.8;
}

@media (max-width:767px) {
  .footer-dark .item:not(.social) {
    text-align: center;
    padding-bottom: 20px;
  }
}

.footer-dark .item.text {
  margin-bottom: 36px;
}

@media (max-width:767px) {
  .footer-dark .item.text {
    margin-bottom: 0;
  }
}

.footer-dark .item.text p {
  opacity: 0.6;
  margin-bottom: 0;
}

.footer-dark .item.social {
  text-align: center;
}

@media (max-width:991px) {
  .footer-dark .item.social {
    text-align: center;
    margin-top: 20px;
  }
}

.footer-dark .item.social > a {
  font-size: 20px;
  width: 36px;
  height: 36px;
  line-height: 36px;
  display: inline-block;
  text-align: center;
  border-radius: 50%;
  box-shadow: 0 0 0 1px rgba(255,255,255,0.4);
  margin: 0 8px;
  color: #fff;
  opacity: 0.75;
}

.footer-dark .item.social > a:hover {
  opacity: 0.9;
}

.footer-dark .copyright {
  text-align: center;
  padding-top: 24px;
  opacity: 0.3;
  font-size: 13px;
  margin-bottom: 0;
}
@media (min-width: 992px) {
  #mainnav {
    padding-left: 130px;
    padding-right: 130px;
  }
}

.nav-item {
  margin-right: 30px;
}

.w-100.d-block {
}

#icondiv {
  height: 100px;
  width: 100px;
  border-radius: 50px;
}

#icondiv {
  margin: auto;
}

@media (min-width: 768px) {
  #imgrow {
    padding-left: 70px;
    padding-right: 70px;
  }
}




</style><?php /**PATH E:\My project\E-learning - Copie\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>