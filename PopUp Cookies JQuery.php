<!-- New Website Pop Up -->
<div id="newSitePopUp" class="newSitePopUp">
    <!-- Modal content -->
    <div class="popup-content">
        <span class="close">&times;</span>
        <div class="popup-body">
            <p>
                Αγαπητοί πελάτες, <br/>
                σας ενημερώνουμε πως σύντομα το παρόν site AME Cosmetics,
                θα αντικατασταθεί από το νέο, ανανεωμένο και πιο φιλικό στη χρήση e-shop PBIbeauty.gr,
                με στόχο την καλύτερη και πιο στοχευμένη εξυπηρέτησή σας.
                Μέχρι τότε, συνεχίζετε να κάνετε κανονικά τις αγορές σας στο υπάρχον site.
                Ευχαριστούμε για την κατανόησή σας και Καλές Αγορές!
            </p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script>
    var cookie = Cookies.get('newSitePopUp');

    if (cookie == null){
        if (window.location.pathname == '/eshop/el/') {
            var newSitePopUp = document.getElementById("newSitePopUp");
            newSitePopUp.style.display = "block";
            window.onclick = function (event) {
                newSitePopUp.style.display = "none";
            }
            Cookies.set('newSitePopUp', 'true', { expires: 1 });
        }
    }
</script>
<!-- New Website Pop Up End -->