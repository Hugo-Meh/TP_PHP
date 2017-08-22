<style>
    #overflow{
        width:100%;
        overflow: hidden;

    }

    /*.photo img{
        width:100%;
    }*/

    #slides .inner{
        width: 500%;
    }

    #slides .photo{
        float: left;
        width: 20%;
        position: relative;
    }


    /********************************************/
    /*FONCTIONNEMENT DU SLIDER*/
    /********************************************/

    input{
        display: none;
    }

    #slide1:checked ~ #slides .inner{
        margin-left: 0;
    }

    #slide2:checked ~ #slides .inner {
        margin-left: -100%;
    }

    #slide3:checked ~ #slides .inner {
        margin-left: -200%;
    }

    #slide4:checked ~ #slides .inner {
        margin-left: -300%;
    }

    #slide5:checked ~ #slides .inner {
        margin-left: -400%;
    }


    #slides .inner{
        transition: all 1s;

    }
    /********************************************/
    /*STYLES*/
    /********************************************/

    #active label{
        width: 10px;
        height: 10px;
        background: red;
        border-radius: 5px;
        display: inline-block;
    }

    #active{
        text-align: center;
    }
</style>
<section id="slider">

    <input checked type="radio" name="slider" id="slide1"/>
    <input  type="radio" name="slider" id="slide2"/>
    <input  type="radio" name="slider" id="slide3"/>
    <input  type="radio" name="slider" id="slide4"/>
    <input  type="radio" name="slider" id="slide5"/>

    <div id="slides">

        <div id="overflow">

            <div class="inner">
                <div class="photo">

                    <img src="image/book_cover/Bel-Ami.jpg" alt="Bel-ami">
                </div>

                <div class="photo">

                    <img src="image/book_cover/Hunger_games.jpg" alt="Hunger games">
                </div>

                <div class="photo">

                    <img src="image/book_cover/le_petit_prince.jpg" alt="le petit prince">
                </div>
                <div class="photo">

                    <img src="image/book_cover/moby_dick.jpg" alt="moby dick">
                </div>

                <div class="photo">

                    <img src="image/book_cover/le_seigneur_des_anneaux.jpg" alt="le seigneur des anneaux">
                </div>

            </div>

        </div>

    </div>

    <div id="active">
        <label for="slide1"></label>
        <label for="slide2"></label>
        <label for="slide3"></label>
        <label for="slide4"></label>
        <label for="slide5"></label>
    </div>

</section>

