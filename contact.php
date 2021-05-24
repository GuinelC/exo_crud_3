<?php include_once "header.php" ?>

<div class="container login">
    <form action="" method="POST">

        <div class="">
            <h1>CONTACT</h1>
        </div>
        <br>

        <div class="form-group formlog">
            <div class="testlabel">Votre Nom:</div>
            <input type="text" name="nom" placeholder="" class="form-control" id="exampleInputPassword1" required>
        </div><br>

        <div class="form-group formlog">
            <div class="testlabel">Votre Adresse Mail:</div>
            <input type="text" name="mail" placeholder="" class="form-control" id="exampleInputPassword1" required>
        </div><br>

        <div class="form-group formlog">
            <div class="testlabel">Votre sujet</div>
            <input type="text" name="sujet" placeholder="" class="form-control" required>
        </div>
    </form>

    <div class="commentArea">
        <form action="" method="POST">
            <h4>Votre commentaire:</h4>
            <textarea class="textarea" name="comment" placeholder="Un avis ?"></textarea> <br> <br>
            <button type="submit" value="envoyer" name="envoyer" class="btn log btn-primary">Envoyer</button> <br> <br>
        </form>
    </div>

</div>


<?php include_once "footer.php" ?>