<?php 

/**
 * booking_form
 * description : affiche le formulaire de reservation
 * @return void
 */
function booking_form()
{
    global $visible_msg;
    global $type_alert;
    global $msg; ?>

    <div class="container d-flex justify-content-center align-items-center">


        <form method="POST" action="index.php" class="p-3 mb-3" id="booking-form">
            <div>
                <h2 class="text-center" style="color:#0d6efd;">Réserver</h2>
            </div>

            <div class="row ">
                <div class="form-group mt-2">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" autocomplete="off" placeholder="Nom">
                </div>

                <div class="form-group mt-2">
                    <label for="inputPrenom">Date</label>
                    <input type="date" class="form-control" id="date" name="date" autocomplete="off" placeholder="Date">
                </div>

            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4" name="envoi" id="envoi" style="width:10rem; height:4rem; font-size:15px">Réserver</button>
            </div>

            <?php if ($visible_msg) {?>
                <div class="alert alert-<?=$type_alert?> mt-4" role="alert" id="msg-error" style="font-size: 15px;">
                    <?= $msg ?>
                </div>
            <?php
            }
            ?>
        </form>
    </div>
<?php
}




/**
 * booking_display
 * description : affiche les reservations existantes
 * @return void
 */
function booking_display()
{
    $bookings = get_bookings();
    if ($bookings) {

    ?>
    <h2 class="text-center" style="color:#0d6efd;">Liste des réservations</h2>
    <table class="table table-responsive table-striped">
        <thead>
            <th scope="col">Nom</th>
            <th scope="col">Date</th>
        </thead>
        <tbody>
            <?php 
                foreach ($bookings as $bk) {
                    echo '<tr>
                            <td>' . $bk['name'] . '</td>
                            <td>' . $bk['date'] . '</td>
                         </tr>';
                }
            ?>
        </tbody>
    </table>

    <?php
    } else { ?>
        <h2 class="text-center" style="color:#0d6efd;">Liste des réservations</h2>
        <div class="alert alert-info mt-5" role="alert" style="font-size: 15px;">
            Aucune réservation n'a été faite pour l'instant
        </div>
       
    <?php
    }

}



