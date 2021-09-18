<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
?>
<div class="area"></div><nav class="main-menu ">
            <ul class="mt-5">
<!--                 <li>
                    <a href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.professeur' ?>">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Accueil
                        </span>
                    </a>
                </li> -->
<!-- 
                <div class="case-container">
                        <div id="case-1" class="case">
                            <li class="mt-3 ">
                                <a href="#">
                                    <i class="fa fa-plus fa-2x"></i>
                                    <span class="nav-text ">Ajouter</span>
                                </a>
                            </li>
                            <div class="case-svg">
                                <svg viewBox="0 0 58 96">
                                    <g id="arrow-down" stroke="#c0c0c0" fill="#c0c0c0" transform="translate(29.000000, 48.000000) scale(-1, 1) rotate(90.000000) translate(-29.000000, -48.000000) translate(-19.000000, 19.000000)" fill-rule="nonzero">
                                        <path d="M0.5,10.3 C0.5,7.7 1.5,5.2 3.4,3.2 C7.3,-0.7 13.7,-0.7 17.6,3.2 L48,33.5 L78.4,3.1 C82.3,-0.8 88.7,-0.8 92.6,3.1 C96.5,7 96.5,13.4 92.6,17.3 L55.1,54.8 C53.2,56.7 50.7,57.7 48,57.7 C45.3,57.7 42.8,56.6 40.9,54.8 L3.4,17.4 C1.5,15.4 0.5,12.8 0.5,10.3 Z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="case-content">
                            <div class="case-content-item ml-5">
                                <li class="">
                                    <a href="<?= WEB_ROUTE . '?controllers=responsable&view=ajout.professeur' ?>">
                                        <i class="fa fa-user fa-2x"></i>
                                        <span class="nav-text">un professeur</span>
                                    </a>
                                </li>
                            </div>
                            <div class="case-content-item ml-5 ">
                                <li class="m">
                                    <a href="<?= WEB_ROUTE . '?controllers=responsable&view=ajout.classe' ?>">
                                    <i class="fa fa-users fa-2x"></i>                                        
                                    <span class="nav-text">une classe</span>
                                    </a>
                                </li>
                            </div>
                        </div>
                </div> -->
                
                <!-- <li class="has-subnav">
                    <a href="#">
                        <i class="fa fa-laptop fa-2x"></i>
                        <span class="nav-text">
                            UI Components
                        </span>
                    </a>
                    
                </li>
                <li class="has-subnav">
                    <a href="#">
                       <i class="fa fa-list fa-2x"></i>
                        <span class="nav-text">
                            Forms
                        </span>
                    </a>
                    
                </li>
                <li class="has-subnav">
                    <a href="#">
                       <i class="fa fa-folder-open fa-2x"></i>
                        <span class="nav-text">
                            Pages
                        </span>
                    </a>
                   
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-font fa-2x"></i>
                        <span class="nav-text">
                            Typography and Icons
                        </span>
                    </a>
                </li> -->
<!-- 
                <li class="mt-5">
                   <a href="<?= WEB_ROUTE . '?controllers=responsable&view=planing.cours' ?>">
                   <i class="fa fa-calendar fa-2x"></i>
                        <span class="nav-text">
                            Planifier un cours
                        </span>
                    </a>
                </li> -->
                <li class="mt-5">
                   <a href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.professeur' ?>">
                   <i class="fa fa-users fa-2x"></i>                                        
                        <span class="nav-text">
                            Liste des professeurs
                        </span>
                    </a>
                </li>
                <li class="mt-3">
                   <a href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.classe' ?>">
                   <i class="fa fa-list fa-2x"></i>
                        <span class="nav-text">
                            Liste des classes
                        </span>
                    </a>
                </li>                
                <li class="mt-3">
                   <a href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.cours' ?>">
                   <i class="fa fa-calendar fa-2x"></i>
                        <span class="nav-text">
                            Liste des cours
                        </span>
                    </a>
                </li>


<!--                 <li class="dropdown mt-2">
                   <a href="#">
                       <i class="fa fa-plus fa-2x"></i>
                        <span class="nav-text dropbtn d-flex">
                            Ajouter<i class="fa fa-chevron-circle-down down"></i>

                        </span>
                        <div class="dropdown-content">
                            <a href="">Un professeur</a>
                            <a href="<?= WEB_ROUTE . '?controllers=responsable&view=creer.classe' ?>">Une classe</a>
                        </div>
                    </a>
                </li> -->


                <li class="mt-3">
                    <a href="<?= WEB_ROUTE . '?controllers=responsable&view=tableau.bord' ?>">
                        <i class="fa fa-bar-chart-o fa-2x"></i>
                        <span class="nav-text">
                            Tableau de bord
                        </span>
                    </a>
                </li>
               <!--  <li>
                   <a href="#">
                        <i class="fa fa-map-marker fa-2x"></i>
                        <span class="nav-text">
                            Maps
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                       <i class="fa fa-info fa-2x"></i>
                        <span class="nav-text">
                            Documentation
                        </span>
                    </a>
                </li> -->

            </ul>

            <ul class="logout">
                <li>
                   <a href="<?=WEB_ROUTE.'?controllers=security&view=deconnexion'?>">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>


<style>
.dropbtn {
    background-color: #152032;
  margin-top: 13px;
  font-size: 14px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: relative;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content a {
  color: #fff;
  padding-top : 4px  ;
  padding-left : 16px  ;
  padding-right : 16px  ;
 padding-bottom : 16px  ;

  text-decoration: none;
  display: block;
  margin-top:0px;
  background-color: #152032;

}

.dropdown-content a:hover {background-color: #5fa2db;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #5fa2db;}


.case {
  display: flex;
  cursor: pointer;
  color: #fff
}
.case-content-item a{
    color: #fff;
    font-size: 14px;
}

.case-svg {
  margin-left: auto;
  transition: transform .5s linear;
  margin-top: 20px;
}

.case-svg > svg {
  width: 20px;
  height: 20px;
  transition: transform 1s linear;
}

.case-svg > svg path {
  fill: white;
  stroke: white;
}

.case.open .case-svg {
  transform: rotatez(90deg);
}


.case-title {
  padding: 0 1em;
  font-weight: bold;
  font-size: 2em;
}

.case-content {
  width: 98%;
  margin: 0 auto;
  font-size: 1em;
  overflow: hidden;
  height: 0px;
}

.case-content > div {
  display: flex;
  align-items: center;
  padding: 10px 20px;
  border-bottom: 1px solid #fff;
  cursor: pointer;
}
.fa-plus:before {
    content: "\f067";
    margin-left: 21px;
    padding-right: 23px;
}
.case-content > div:nth-last-child(1) {
  border-bottom: 0;
}


.case-content-title {
  padding: 0 1em;
  font-weight: bolder;
}
</style>
<script>
            const Wallet = function () {
        let selectedCase = null;
        
        const reduce = (items, cb, start) => {
            let current = start
            items.forEach((item) => {
            current = cb(item, current)
            })
            return current
        }
        
        const close = (wcase) => {
            const items = wcase.querySelectorAll('.case-content-item')
            const totalHeight = reduce(items, (p, c) => c + p.clientHeight, 0)
            const height = wcase.style.height
            let currentHeight = height.substr(0, height.length - 2)
        
            const interval = setInterval(() => {
            const increase = 0.01 * 200
            currentHeight -= increase
        
            if (currentHeight < 0) {
                currentHeight = 0
                clearInterval(interval)
            }
        
            wcase.style.height = currentHeight + 'px'
            }, 1)
        }
        
        const open = (wcase) => {
            const items = wcase.querySelectorAll('.case-content-item')
            const totalHeight = reduce(items, (p, c) => c + p.clientHeight, 0)
            let currentHeight = 0
        
            const interval = setInterval(() => {
            const increase = 0.01 * 100
            currentHeight += increase
        
            if (currentHeight > totalHeight) {
                currentHeight = totalHeight
                clearInterval(interval)
                this.selectedCase = wcase
            }
        
            wcase.style.height = currentHeight + 'px'
            }, 1)
        }
        
        this.selectCase = (walletCase) => {
            const wcase = walletCase.querySelector('.case')
            const content = walletCase.querySelector('.case-content')
            if (this.selectedCase === content) {
            this.selectedCase = null
            wcase.classList.toggle('open')
            close(content)
            } else {
            wcase.classList.toggle('open')
            open(content)
            if (this.selectedCase) {
                this.selectedCase.parentElement.firstElementChild.classList.toggle('open')
                close(this.selectedCase)
            }
            }
        }
        }

const wallet = new Wallet();
const cases = document.querySelectorAll('.case-container')

cases.forEach((walletCase) => {
    walletCase.addEventListener(
      'click',
      () => wallet.selectCase(walletCase)
    )
  }
)
    </script>



