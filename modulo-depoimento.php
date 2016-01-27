<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Papillon Eventos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="assets/scripts/jquery.cycle2.min.js"></script>
    <script src="assets/scripts/jquery.cycle2.center.min.js"></script>
    <script src="script.js"></script>
    <style media="screen">

        /*.depo-box {
            display: none;
        }

        .depo-box.active {
            display: inherit;
        }*/

        .flecha {
            color: #007cc9;
            cursor: pointer;
            font-size: 5em;
            position: absolute;
            top: calc(50% - 45px);
            z-index: 999;
        }

        .flecha.esquerda {
            left: -15px;
        }

        .flecha.direita {
            right: -15px;
        }
    </style>
  </head>
  <body class="resolucao">
    <main>
      <section id="depoimentos" class="depoimentos">
        <div class="wrap clearfix cycle-slideshow"
                data-cycle-fx="fade"
                data-cycle-timeout="0"
                data-cycle-slides="> div">
          <h1 class="hidden">Depoimentos</h1>
          <div class="grupo">
              <span class="depo-box">
                <img src="assets/img/depoimento01.png" alt="Imagem do depoente">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid necessitatibus iusto error, voluptates voluptatibus architecto suscipit quia debitis dolorem omnis nobis eos pariatur reiciendis unde reprehenderit cupiditate officiis, recusandae perferendis.</p>
                <span class="autor">Marcos, 2015</span>
            </span>
              <span class="depo-box">
                <img src="assets/img/depoimento02.png" alt="Imagem do depoente">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At quas tenetur aliquid, obcaecati totam aliquam quis optio ea atque molestias aspernatur magni perspiciatis blanditiis sint ut. Maiores ipsa quos aliquid!</p>
                <span class="autor">Luana, 2015</span>
            </span>
              <span class="depo-box">
                <img src="assets/img/depoimento03.png" alt="Imagem do depoente">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima ipsum placeat, itaque fugiat voluptatum facere at nostrum veritatis rerum odit iste consequatur ad libero quam temporibus? Doloremque dolor quam omnis.</p>
                <span class="autor">João e Luana, 2015</span>
            </span>
          </div>
          <div class="grupo">
              <span class="depo-box">
                <img src="assets/img/depoimento02.png" alt="Imagem do depoente">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima ipsum placeat, itaque fugiat voluptatum facere at nostrum veritatis rerum odit iste consequatur ad libero quam temporibus? Doloremque dolor quam omnis.</p>
                <span class="autor">João e Luana, 2015</span>
            </span>
              <span class="depo-box">
                <img src="assets/img/depoimento03.png" alt="Imagem do depoente">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima ipsum placeat, itaque fugiat voluptatum facere at nostrum veritatis rerum odit iste consequatur ad libero quam temporibus? Doloremque dolor quam omnis.</p>
                <span class="autor">João e Luana, 2015</span>
            </span>
            <span class="depo-box">
                <img src="assets/img/depoimento01.png" alt="Imagem do depoente">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima ipsum placeat, itaque fugiat voluptatum facere at nostrum veritatis rerum odit iste consequatur ad libero quam temporibus? Doloremque dolor quam omnis.</p>
                <span class="autor">João e Luana, 2015</span>
            </span>
          </div>
          <div class="grupo">
              <span class="depo-box">
                <img src="assets/img/depoimento03.png" alt="Imagem do depoente">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima ipsum placeat, itaque fugiat voluptatum facere at nostrum veritatis rerum odit iste consequatur ad libero quam temporibus? Doloremque dolor quam omnis.</p>
                <span class="autor">João e Luana, 2015</span>
            </span>
              <span class="depo-box">
                <img src="assets/img/depoimento01.png" alt="Imagem do depoente">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima ipsum placeat, itaque fugiat voluptatum facere at nostrum veritatis rerum odit iste consequatur ad libero quam temporibus? Doloremque dolor quam omnis.</p>
                <span class="autor">João e Luana, 2015</span>
            </span>
          </div>
          <span class="flecha esquerda cycle-prev"><i class="fa fa-caret-left"></i></span>
          <span class="flecha direita cycle-next"><i class="fa fa-caret-right"></i></span>
        </div>
      </section>
    </main>
  </body>
</html>
