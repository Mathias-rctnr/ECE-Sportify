<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Paiement</title>
    <link rel="stylesheet" href="paiement.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>

<body>
    <div class="Prix">
        <?php
        session_start(); //Affichage du prix a payer
        echo "<p class='txt_prix'>" . $_SESSION["prix"] . "&#8364</p>";
        ?>
    </div>
    <div id="Wrapper">
        <div id="W_Carte">
            <div id="full_carte">
                <div id="carte">
                    <img class="fondIMG" src="photos/FondCB.jpeg">
                    <div id="Carte_Sup">
                        <img id="Puce" src="photos/Puce_Carte.png"></img>
                        <img id="logo" src="photos/logo_mastercard.png">
                    </div>
                    <div id="Carte_Inf">
                        <p id="ID_CARTE">#### #### #### ####</p>
                    </div>
                    <div id="Carte_Bas">
                        <div class="colonne_basG">
                            <p id="NOM_CARTE">NOM PRENOM</p>
                        </div>
                        <div class="expire">
                            <p class="txt_Expire">Expire fin</p>
                            <div class="colonne_basD">
                                <p id="DATE_CARTE_M">MM</p>
                                <p id="slash">/</p>
                                <p id="DATE_CARTE_Y">YYYY</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Dos_Carte">
                    <img class="fondIMGDos" src="photos/FondCB.jpeg">
                    <div class="Div_Dos_Carte">
                        <div id="Bande_Noir"></div>
                        <div class="Wrapper_Signature">
                            <p class="CVV_txt">CVV</p>
                            <div id="Signature">
                                <div id="Case_CVV"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="W_Entree">
            <form id="FormCB" method="post" action="BDD_paiement.php">
                <div id="Entree">
                    <div id="Partie1">
                        <div class="Wrap_Num">
                            <p id="Inp_Num_carte" class="Champs" pattern="[0-9]*">Numero de carte:</p>
                            <input id="Num_carte" class="Champs" type="text" name="Num_Carte" maxlength="20" required>
                        </div>
                        <div class="Wrap_Date">
                            <p class="Champs">Titulaire:</p>
                            <input id="Titulaire" class="Champs" name="Titulaire" min="0" max="24" type="text"
                                pattern="[A-Za-z\s]*" required>
                        </div>
                    </div>
                    <div id="Partie2">
                        <div class="Inp_Date">
                            <div class="Div_InpMois">
                                <p class="Champs">Expiration (MM):</p>
                                <select name="mois" id="InpMois" required>
                                    <option value="999" disabled>Mois</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="Div_InpAnnee">
                                <p class="Champs">Expiration (YYYY):</p>
                                <select name="annee" id="InpAnnee" required>
                                    <option value="999" disabled>Annee</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                    <option value="2031">2031</option>
                                    <option value="2032">2032</option>
                                    <option value="2033">2033</option>
                                    <option value="2034">2034</option>
                                    <option value="2035">2035</option>
                                </select>
                            </div>
                        </div>
                        <div class="Inp_Type">
                            <div class="Wrap_CVC">
                                <p class="Champs">Type:</p>
                                <select name="type_Carte" id="InpType" required>
                                    <option value="999" disabled>Carte</option>
                                    <option value="01">VISA</option>
                                    <option value="02">MasterCard</option>
                                    <option value="03">PayPal</option>
                                    <option value="04">American Express</option>
                                </select>
                            </div>
                            <div class="Div_InpCVV">
                                <p class="Champs" for="CVV">CVV:</p>
                                <input pattern="[0-9]*" id="CVV" class="Champs" name="CVV" type="text" maxlength="3"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div id="btn_submit"><input class="bouton" id="sub_Btn" type="submit"></div>
                </div>
            </form>
        </div>
    </div>
    <script src="paiement.js"></script>
</body>

</html>