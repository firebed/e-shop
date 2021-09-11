@extends('eshop::customer.layouts.master', ['title' => 'Όροι χρήσης'])

@php
    $url = env('APP_URL');
    $base = basename($url);
    $link = "<a href='$url'>$base</a>";
@endphp

@section('main')
    <div class="container-fluid py-4 bg-white">
        <div class="container">
            <h1 class="fs-3 mb-3">Όροι χρήσης</h1>

            <h2 class="fs-4 mb-3">ΟΡΟΙ ΧΡΗΣΗΣ ΗΛΕΚΤΡΟΝΙΚΟΥ ΚΑΤΑΣΤΗΜΑΤΟΣ</h2>

            <h3 class="fw-bold fs-6 mb-3">Παρεχόμενες πληροφορίες & Προϊόντα</h3>

            <p>Η εταιρία δεσμεύεται ως προς την ακρίβεια, την αλήθεια και την πληρότητα των πληροφοριών που παρατίθενται στο ηλεκτρονικό κατάστημα, σε ότι αφορά την ταυτότητα της εταιρίας όσο και τις παρεχόμενες μέσω του ηλεκτρονικού
                καταστήματος, συναλλαγές. Η εταιρία, στα πλαίσια της καλής πίστης, δεν ευθύνεται και δεν δεσμεύεται από καταχωρήσεις ηλεκτρονικών δεδομένων που έγιναν εκ σφάλματος/παραδρομής κατά την κοινή πείρα και δικαιούται να προβαίνει σε διόρθωση αυτών οποτεδήποτε αντιληφθεί την ύπαρξή
                τους.</p>

            <h3 class="fw-bold fs-6 mb-3">Παραγγελίες μέσω ηλεκτρονικού εμπορίου</h3>

            <p>Για τη χρήση των υπηρεσιών ηλεκτρονικού εμπορίου του δικτυακού τόπου {!! $link !!} από τον επισκέπτη / χρήστη ζητούνται τα εξής στοιχεία : Ονοματεπώνυμο/ Επωνυμία Επιχείρησης - Διεύθυνση φυσικού προσώπου /Έδρα επιχείρησης - ΤΚ - Τηλέφωνο - E-mail - fax - ΑΦΜ - ΔΟΥ - Πόλη - Χώρα -
                Στοιχεία Πιστωτικής Κάρτας. Τα ανωτέρω στοιχεία απαιτούνται και για την έκδοση των σχετικών παραστατικών (φορολογικών) και διατηρούνται στο οικονομικό αρχείο της {!! $link !!}. Οι διαχειριστές του τόπου {!! $link !!} μπορούν να χρησιμοποιούν τα στοιχεία που αναφέρονται στο είδος των
                αποκτώμενων αγαθών και υπηρεσιών μέσω του ηλεκτρονικού εμπορίου προκειμένου να καταγράφουν τα αγοραστικά ενδιαφέροντα του συναλλασσόμενου και να προβαίνουν σε νέες προσφορές, εκτός αν ο επισκέπτης / χρήστης των υπηρεσιών
                αυτών ζητήσει να μη γίνονται τέτοιου είδους προσφορές. Τα στοιχεία που αφορούν τα αγοραστικά ενδιαφέροντα του επισκέπτη / χρήστη ουδέποτε δύνανται να γνωστοποιηθούν σε τρίτους.</p>

            <h3 class="fw-bold fs-6 mb-3">Στοιχεία Πιστωτικής Κάρτας</h3>

            <p>Η Πιστωτική Κάρτα του επισκέπτη / χρήστη για την εξόφληση υπηρεσιών /συνδρομών του δικτυακού τόπου {!! $link !!} χρεώνεται μόνο για τη συγκεκριμένη συναλλαγή. Τα στοιχεία της πιστωτικής κάρτας δεν μπορούν να χρησιμοποιηθούν για κανέναν άλλο σκοπό.</p>

            <h3 class="fw-bold fs-6 mb-3">IP Addresses</h3>

            <p>H διεύθυνση IP μέσω της οποίας ο Η/Υ έχει πρόσβαση στο Internet και στη συνέχεια στην ιστοσελίδα {!! $link !!} αξιοποιείται αποκλειστικά για την συγκέντρωση στατιστικών στοιχείων.</p>

            <h3 class="fw-bold fs-6 mb-3">Cookies</h3>

            <p>Cookies Analytics: Είναι υποσύνολο των Cookies λειτουργικότητας και μας δίνουν τη δυνατότητα να αξιολογούμε την αποτελεσματικότητα των διάφορων λειτουργιών της ιστοσελίδας μας, βελτιώνοντας έτσι συνεχώς την εμπειρία που σας προσφέρουμε.</p>

            <p>Τρίτοι προμηθευτές, συμπεριλαμβανομένης της Google, δύναται να εμφανίσουν διαφημίσεις της εταιρίας σε ιστότοπους στο διαδίκτυο, να κάνουν χρήση cookies για την ενημέρωσή, βελτιστοποίηση και προβολή διαφημίσεων που
                βασίζονται σε προηγούμενη επίσκεψη του χρήστη στην ιστοσελίδα {!! $link !!}.</p>

            <p>To {!! $link !!} δύναται επίσης να αξιοποιήσει τα cookies από προηγούμενη επίσκεψη σας στην ιστοσελίδα του για επαναληπτικό μάρκετινγκ. Μπορείτε να επιλέξετε να εξαιρεθείτε από μία τέτοια χρήση των cookies από την Google, πατώντας εδώ. Επίσης μπορείτε να ρυθμίσετε τον Περιηγητή σας
                (chrome,firefox edge κλπ), να σας ενημερώνει κάθε φορά πριν γίνει η λήψη ενός cookie και να αποφασίζετε εσείς τη λήψη του ή την απόρριψή του. Σ' αυτή την περίπτωση έχετε υπόψη ότι ενδέχεται να μην είστε σε θέση να αξιοποιήσετε όλες τις δυνατότητες του.</p>

            <p>To {!! $link !!} συμμορφώνεται με την Πολιτική διαφημίσεων βάσει ενδιαφέροντος του Google AdWords και τους περιορισμούς της.</p>

            <p>To {!! $link !!} και τρίτοι προμηθευτές, συμπεριλαμβανομένης της Google, χρησιμοποιούν μαζί cookie (όπως το cookie του Google Analytics) για την ενημέρωση, τη βελτιστοποίηση και την προβολή διαφημίσεων, σύμφωνα με τις προηγούμενες επισκέψεις κάποιων χρηστών στον ιστότοπο της, για την
                εκτέλεση αναφορών σχετικά με τον τρόπο με τον οποίο οι εμφανίζονται οι διαφημίσεις του {!! $link !!}, άλλες χρήσεις υπηρεσιών διαφήμισης, αλληλεπιδράσεις με αυτές τις εμφανίσεις διαφημίσεων και υπηρεσίες διαφήμισης που σχετίζονται με επισκέψεις στην ιστοσελίδα {!! $link !!}. To
                {!! $link !!} δύναται να χρησιμοποιεί τα δεδομένα από τη διαφήμιση βάσει ενδιαφέροντος της Google ή τα δεδομένα κοινού τρίτου μέρους (όπως η ηλικία, το φύλο και τα ενδιαφέροντα) με το Google Analytics.</p>

            <p>Άλλα cookies τρίτων που χρησιμοποιεί η ιστοσελίδα {!! $link !!} είναι από τις εταιρείες Facebook για κοινωνικό διαμοιρασμό (Πολιτική Cookies Facebook) και Paypal για την εξυπηρέτηση πληρωμών των χρηστών εφόσον επιλεγεί αυτός ο τρόπος πληρωμής από τους ίδιους τους χρήστες (Πολιτική
                Cookies Paypal).</p>

            <p>Διατηρούμε το δικαίωμα να αλλάξουμε αυτή την πολιτική για cookies οποτεδήποτε. Οποιεσδήποτε αλλαγές στην παρούσα πολιτική Cookies θα ισχύσουν από τη στιγμή που η αναθεωρημένη πολιτική Cookies είναι διαθέσιμη στην ιστοσελίδα μας.</p>

            <h2 class="fs-4 mb-3 mt-5">ΠΕΡΙΟΡΙΣΜΟΣ ΕΥΘΥΝΗΣ</h2>

            <h3 class="fw-bold fs-6 mb-3">Σύμβαση χρήσης</h3>

            <p>Ο επισκέπτης / χρήστης των σελίδων και των υπηρεσιών της παρούσας ιστοσελίδας παραχωρεί τη συγκατάθεσή του στους κατωτέρω όρους χρήσης, που ισχύουν για το σύνολο του περιεχομένου, των σελίδων, των γραφικών, των
                εικόνων, των φωτογραφιών και των αρχείων που περιλαμβάνονται στην παρούσα ιστοσελίδα. Συνεπώς, οφείλει να διαβάσει προσεκτικά τους όρους αυτούς πριν από την επίσκεψη ή τη χρήση των σελίδων και των υπηρεσιών της παρούσας ιστοσελίδας. Εάν δε συμφωνεί, τότε οφείλει να μην κάνει χρήση
                των υπηρεσιών και του περιεχομένου της παρούσας ιστοσελίδας. Ο επισκέπτης / χρήστης παρακαλείται να ελέγχει το περιεχόμενο των συγκεκριμένων σελίδων για ενδεχόμενες αλλαγές. Η εξακολούθηση της χρήσης της παρούσας ιστοσελίδας ακόμη και μετά τις όποιες αλλαγές σημαίνει την
                ανεπιφύλακτη εκ μέρους του επισκέπτη / χρήστη αποδοχή των όρων αυτών.</p>

            <h3 class="fw-bold fs-6 mb-3">Δικαιώματα πνευματικής και βιομηχανικής ιδιοκτησίας</h3>

            <p>Εκτός των ρητά αναφερόμενων εξαιρέσεων (πνευματικά δικαιώματα τρίτων, συνεργατών και φορέων), όλο το περιεχόμενο του δικτυακού τόπου {!! $link !!}, συμπεριλαμβανομένων εικόνων, γραφικών, φωτογραφιών, σχεδίων, κειμένων, των παρεχόμενων υπηρεσιών και γενικά όλων των αρχείων αυτού του
                site, αποτελούν πνευματική ιδιοκτησία, κατατεθειμένα σήματα και σήματα υπηρεσιών του δικτυακού τόπου {!! $link !!} και προστατεύονται κατά τις σχετικές διατάξεις του ελληνικού δικαίου, του ευρωπαϊκού δικαίου και των διεθνών συμβάσεων. Συνεπώς, κανένα εξ αυτών δε δύναται να αποτελέσει
                εν όλω ή εν μέρει αντικείμενο πώλησης, αντιγραφής, τροποποίησης, αναπαραγωγής, αναδημοσίευσης ή να "φορτωθεί", να μεταδοθεί ή να διανεμηθεί με οποιονδήποτε τρόπο. Εξαιρείται η περίπτωση της μεμονωμένης αποθήκευσης ενός και μόνου αντιγράφου τμήματος του περιεχομένου σε έναν απλό
                προσωπικό Η/Υ (ηλεκτρονικό υπολογιστή) για προσωπική και όχι δημόσια ή εμπορική χρήση και χωρίς απαλοιφή της ένδειξης προέλευσής τους από τον δικτυακό τόπο {!! $link !!}, χωρίς να θίγονται με κανένα τρόπο τα σχετικά δικαιώματα πνευματικής και βιομηχανικής ιδιοκτησίας.
                Τα λοιπά προϊόντα ή υπηρεσίες που αναφέρονται στις ηλεκτρονικές σελίδες του παρόντος κόμβου και φέρουν τα σήματα των αντίστοιχων οργανισμών, εταιρειών, συνεργατών φορέων, ενώσεων ή εκδόσεων, αποτελούν δική τους πνευματική και βιομηχανική ιδιοκτησία και συνεπώς οι φορείς αυτοί φέρουν
                τη σχετική ευθύνη.</p>

            <h3 class="fw-bold fs-6 mb-3">Ευθύνη επισκέπτη / χρήστη</h3>

            <p>Ο επισκέπτης / χρήστης των σελίδων και των υπηρεσιών του δικτυακού τόπου {!! $link !!} αναλαμβάνει την ευθύνη για οποιαδήποτε ζημία προκαλείται στον δικτυακό τόπο {!! $link !!} από κακή ή αθέμιτη χρήση των σχετικών υπηρεσιών. Περιορισμός ευθύνης του δικτυακού τόπου {!! $link !!}.</p>

            <p>Υπό οποιεσδήποτε συνθήκες, συμπεριλαμβανομένης και της περίπτωσης αμέλειας, οι διαχειριστές του δικτυακού τόπου {!! $link !!} δεν ευθύνονται για οποιασδήποτε μορφής ζημία υποστεί ο επισκέπτης / χρήστης των σελίδων, υπηρεσιών, επιλογών και περιεχομένων του δικτυακού τόπου {!! $link !!}
                στις οποίες προβαίνει με δική του πρωτοβουλία και με τη γνώση των όρων του παρόντος.</p>

            <p>Τα περιεχόμενα του δικτυακού τόπου {!! $link !!} παρέχονται "όπως ακριβώς είναι" χωρίς καμία εγγύηση εκπεφρασμένη ή και συνεπαγόμενη με οποιοδήποτε τρόπο. Στο μέγιστο βαθμό και σύμφωνα με το νόμο, οι διαχειριστές του δικτυακού τόπου {!! $link !!} αρνούνται όλες τις εγγυήσεις
                εκπεφρασμένες ή και συνεπαγόμενες, συμπεριλαμβανομένων, όχι όμως περιοριζόμενων σε αυτό, αυτών, οι οποίες συνεπάγονται την εμπορευσιμότητα και την καταλληλότητα για ένα συγκεκριμένο σκοπό.</p>

            <p>Οι διαχειριστές του δικτυακού τόπου {!! $link !!} δεν εγγυώνται ότι οι σελίδες, οι υπηρεσίες, οι επιλογές και τα περιεχόμενα θα παρέχονται χωρίς διακοπή, χωρίς σφάλματα και ότι τα λάθη θα διορθώνονται.</p>

            <p>Επίσης οι διαχειριστές του δικτυακού τόπου {!! $link !!} δεν εγγυώνται ότι το ίδιο ή οποιοδήποτε άλλο συγγενικό site ή οι εξυπηρετητές "servers" μέσω των οποίων αυτά τίθενται στη διάθεσή σας, σας παρέχονται χωρίς "ιούς" ή άλλα επιζήμια συστατικά.</p>

            <p>Οι διαχειριστές του δικτυακού τόπου {!! $link !!} δεν εγγυώνται σε καμία περίπτωση την ορθότητα, την πληρότητα ή και διαθεσιμότητα των περιεχομένων, σελίδων, υπηρεσιών, επιλογών ή τα αποτελέσματά τους.</p>

            <p>Το κόστος των ενδεχόμενων διορθώσεων ή εξυπηρετήσεων, το αναλαμβάνει ο επισκέπτης / χρήστης και σε καμία περίπτωση οι διαχειριστές του δικτυακού τόπου {!! $link !!}.</p>

            <h3 class="fw-bold fs-6 mb-3">"Δεσμοί" (links) προς άλλα sites</h3>

            <p>Οι διαχειριστές του δικτυακού τόπου {!! $link !!} δεν ελέγχουν τη διαθεσιμότητα, το περιεχόμενο, την πολιτική προστασίας των προσωπικών δεδομένων, την ποιότητα και την πληρότητα των υπηρεσιών άλλων web sites και σελίδων στα οποία παραπέμπει η παρούσα ιστοσελίδα μέσω "δεσμών",
                hyperlinks ή διαφημιστικών banners. Συνεπώς για οποιοδήποτε πρόβλημα παρουσιασθεί κατά την επίσκεψη / χρήση τους οφείλετε να απευθύνεστε απευθείας στα αντίστοιχα web sites και σελίδες, τα οποία και φέρουν τη σχετική ευθύνη για την παροχή των υπηρεσιών τους. Οι διαχειριστές του
                δικτυακού τόπου {!! $link !!} σε καμία περίπτωση δεν πρέπει να θεωρηθεί ότι ενστερνίζονται ή αποδέχονται το περιεχόμενο ή τις υπηρεσίες των web sites και των σελίδων στα οποία παραπέμπει ή ότι συνδέεται με αυτά κατά οποιονδήποτε άλλο τρόπο.</p>

            <h3 class="fw-bold fs-6 mb-3">Ηλεκτρονικό Εμπόριο</h3>

            <p>Η παρούσα ιστοσελίδα παρέχει στους επισκέπτες / χρήστες του υπηρεσίες ηλεκτρονικού εμπορίου σύμφωνα με τους ειδικότερους όρους που αυτό τάσσει και μεριμνώντας για την προστασία των προσωπικών στοιχείων που υποβάλλουν
                για τη χρήση των υπηρεσιών αυτών. Οι διαχειριστές του δικτυακού τόπου {!! $link !!} δεν ευθύνονται για την ποιότητα των αγαθών που αποκτώνται μέσω των υπηρεσιών ηλεκτρονικού εμπορίου και η συναλλαγή δεσμεύει αποκλειστικά τον επισκέπτη / χρήστη και την εταιρεία παροχής αγαθών. Συνεπώς
                σε καμία περίπτωση δεν μπορεί να εμπλακεί η παρούσα ιστοσελίδα ή οι διαχειριστές της σε σχετική δικαστική διαφορά που προκύπτει από τη συναλλαγή αυτή. Τέλος, η υπογραφή του χρήστη κατά την παραλαβή των αγαθών, που αποκτώνται μέσω της παρούσης ιστοσελίδας, δηλώνει ότι τα προϊόντα
                παρελήφθησαν σύμφωνα με την παραγγελία του πελάτη/επισκέπτη/χρήστη. Στην περίπτωση που η παραγγελία έχει σταλεί λανθασμένα, ο πελάτης δεν πρέπει να υπογράφει σε καμία περίπτωση και τα προϊόντα επιστρέφουν στην έδρα της εταιρείας με έξοδα και ευθύνη της εταιρείας.</p>

            <h3 class="fw-bold fs-6 mb-3">Εφαρμοστέο δίκαιο και λοιποί όροι</h3>

            <p>Οι ανωτέρω όροι και προϋποθέσεις χρήσης του δικτυακού τόπου {!! $link !!}, καθώς και οποιαδήποτε τροποποίηση, αλλαγή ή αλλοίωσή τους διέπονται και συμπληρώνονται από το ελληνικό δίκαιο, το δίκαιο της ευρωπαϊκής ένωσης και τις σχετικές διεθνείς συνθήκες. Οποιαδήποτε διάταξη των ανωτέρω
                όρων καταστεί αντίθετη προς το νόμο, παύει αυτοδικαίως να ισχύει και αφαιρείται από το παρόν, χωρίς σε καμία περίπτωση να θίγεται η ισχύς των λοιπών όρων. Το παρόν αποτελεί τη συνολική συμφωνία μεταξύ του δικτυακού τόπου {!! $link !!} και του επισκέπτη / χρήστη των σελίδων και
                υπηρεσιών του και δε δεσμεύει παρά μόνο αυτούς. Καμία τροποποίηση των όρων αυτών δε θα λαμβάνεται υπόψη και δε θα αποτελεί τμήμα της συμφωνίας αυτής, εάν δεν έχει διατυπωθεί εγγράφως και δεν έχει ενσωματωθεί σε αυτή.</p>

            <h2 class="fs-4 mb-3 mt-5">ΤΑ ΚΥΡΙΟΤΕΡΑ ΔΙΚΑΙΩΜΑΤΑ ΣΑΣ ΣΧΕΤΙΚΑ ΜΕ ΤΟ ΗΛΕΚΤΡΟΝΙΚΟ ΕΜΠΟΡΙΟ</h2>

            <h3 class="fw-bold fs-6 mb-3">Πως θα επιβεβαιώσω την ταυτότητα και την ασφάλεια της εμπορικής ιστοσελίδας που επισκέπτομαι;</h3>

            <p>Ένα ηλεκτρονικό κατάστημα που μεριμνά για την ασφάλεια των πελατών του θα χρησιμοποιεί και θα αναφέρει ρητά όλα τα απαραίτητα συστήματα ασφάλειας καθώς και θα παρέχει τις απαραίτητες πληροφορίες για την πιστοποίηση της
                ταυτότητας του. Πριν προχωρήσετε στη συναλλαγή σας ελέγξτε προσεκτικά στην ιστοσελίδα του για την ταυτότητά του και τα συστήματα ασφαλείας που χρησιμοποιεί.</p>

            <p>Μπορείτε να ενημερωθείτε για την "ταυτότητα" της ιστοσελίδας του ηλεκτρονικού καταστήματος που επισκέπτεστε, αναζητώντας την μέσα από μητρώα του Internet (π.χ. τη διεθνή βάση δεδομένων <a href="https://grweb.ics.forth.gr/public/" target="_blank">https://grweb.ics.forth.gr/public</a>).
                Εκεί θα βρείτε σε ποιόν ακριβώς έχει κατοχυρωθεί το ηλεκτρονικό κατάστημα, δηλ. ποιος είναι ο πραγματικός ιδιοκτήτης. Μπορείτε ακόμα να αναζητήσετε την ύπαρξη ενός ειδικού σήματος στην ιστοσελίδα που πιστοποιεί την ταυτότητά της. Ακόμα χρήσιμο θα ήταν πριν προβείτε σε αγορές να
                επικοινωνήσετε με τον τηλεφωνικό αριθμό του φυσικού καταστήματος (είναι υποχρεωτική η αναγραφή του στην ιστοσελίδα) για να διαπιστώσετε πως όντως πρόκειται για το κατάστημα που έχετε επιλέξει.</p>

            <p>Όσον αφορά την ασφάλεια, ένα ηλεκτρονικό κατάστημα θα πρέπει να χρησιμοποιεί μια σειρά από "συστήματα ασφαλείας" προκειμένου να διασφαλίσει την ασφάλεια των συναλλαγών του μαζί σας, όπως:</p>

            <p>Μια ψηφιακή ταυτότητα (digital ID) από κάποιο αναγνωρισμένο φορέα πιστοποίησης (οι ψηφιακές ταυτότητες επιβεβαιώνουν την ταυτότητα του συναλλασσομένου εμπόρου). Ένα πρωτόκολλο ασφαλείας (π.χ., Secure Socket Layer -
                SSL, ή Secure Electronic Transaction - SEΤ). Μια ασφαλή σύνδεση. Προτού δώσετε τα στοιχεία της πιστωτικής σας κάρτας επιβεβαιώστε πως χρησιμοποιείτε ασφαλή σύνδεση βλέποντας στην οθόνη σας, στην περιοχή της διαδικτυακής διεύθυνσης το σύμβολο https://. Η ύπαρξη αυτού του συμβόλου
                παρέχει πρόσθετη εξασφάλιση.</p>

            <p>Οι έλεγχοι για την ασφάλεια και την εγκυρότητα του ηλεκτρονικού καταστήματος πρέπει να γίνονται ανεξάρτητα από το αν η πρόσβασή μας στο Διαδίκτυο γίνεται από τον υπολογιστή, από κινητό τηλέφωνο (π.χ. WAP) ή από την
                διαλογική (interactive) τηλεόραση. Επιπλέον, πρέπει να έχουμε υπ' όψη πως οι αγορές μέσω κινητών τηλεφώνων της παρούσης γενιάς εισάγουν ένα διαφορετικό βαθμό επικινδυνότητας λόγω και της ασύρματης μετάδοσης γι' αυτό και πρέπει να προσπαθούμε να ενημερωθούμε για την ασφάλεια των
                υπηρεσιών ηλεκτρονικού εμπορίου αυτού του τύπου.</p>

            <h3 class="fw-bold fs-6 mb-3">Μπορώ να εμπιστευθώ τα στοιχεία της πιστωτικής μου κάρτας στο Διαδίκτυο;</h3>

            <p>Πολλοί διστάζουμε να δώσουμε τον αριθμό της πιστωτικής μας κάρτας σε ένα ηλεκτρονικό κατάστημα ακόμη και αν μας είναι γνωστό και καθιερωμένο. Ο δισταγμός αυτός είναι κυρίως ψυχολογικός αφού υπάρχουν αρκετά θέματα
                που πρέπει να προσέξει κανείς, όμως η φιλολογία που έχει αναπτυχθεί περί τεραστίου προβλήματος ασφάλειας δεν ανταποκρίνεται στην πραγματικότητα. Όπως προκύπτει από τη διεθνή εμπειρία, μικρό ποσοστό των κρουσμάτων απάτης που αφορούν σε κάρτες, έχουν σχέση με τις διαδικτυακές
                συναλλαγές. Σήμερα, τα ηλεκτρονικά καταστήματα, με την κρυπτογράφηση των δεδομένων (καθώς και με την υιοθέτηση των ψηφιακών υπογραφών στο σύντομο μέλλον) μειώνουν σημαντικά τις περιπτώσεις ηλεκτρονικής απάτης.</p>

            <p>Ακόμη όμως και στη σπάνια περίπτωση που παρατηρήσετε στην πιστωτική σας κάρτα χρέωση που δεν έχετε κάνει, έχετε το δικαίωμα να επικοινωνήσετε με την τράπεζα που εξέδωσε την πιστωτική σας κάρτα και να ζητήσετε να
                ακυρωθεί η συναλλαγή. Η τράπεζα είναι υποχρεωμένη να ερευνήσει τη καταγγελία σας και ακολούθως να ενεργήσει με τρόπο ανάλογο που πράττει στις συμβατικές συναλλαγές. Εφόσον το αίτημά σας είναι δικαιολογημένο, θα σας επιστρέψει τα χρήματα. Όμως προσοχή: Το αίτημα σας για ακύρωση
                της χρέωσης θα πρέπει να γίνει μέσα σε εύλογη προθεσμία (που καθορίζεται στη σύμβαση που έχετε κάνει με τον φορέα της πιστωτικής κάρτας). Γι αυτό το λόγο θα πρέπει απαραίτητα να ελέγχετε προσεκτικά τα μηνιαία εκκαθαριστικά της κάρτας σας (αυτή η συμβουλή ισχύει για όλες τις
                συναλλαγές που κάνετε με πιστωτική κάρτα, ηλεκτρονικές και μη).</p>

            <p>Αν παρόλα αυτά συνεχίζετε να είστε επιφυλακτικοί στο να δώσετε τα στοιχεία της πιστωτικής σας κάρτας, μπορείτε να προχωρήσετε στην συναλλαγή, ζητώντας να πληρώσετε με εναλλακτικούς τρόπους, όπως είναι η αντικαταβολή ή
                η μετάδοση του αριθμού της κάρτας σας μέσω fax σε αρμόδιο υπάλληλο της επιχείρησης. Ακόμα μπορείτε να επικοινωνήσετε με την τράπεζα σας σχετικά με τις νέες πιστωτικές κάρτες περιορισμένης χρέωσης, ένα προϊόν που πρόκειται σύντομα να κυκλοφορήσει και στην ελληνική αγορά.</p>

            <h3 class="fw-bold fs-6 mb-3">Ποια προσωπικά μου δεδομένα έχω δικαίωμα να διαφυλάξω από κάθε χρήση;</h3>

            <p>Οι ρυθμίσεις που αφορούν την προστασία των προσωπικών δεδομένων εφαρμόζονται και στο δικτυακό περιβάλλον. Τα προσωπικά δεδομένα δεν είναι "ελεύθερο εμπόρευμα". Η συλλογή και η επεξεργασία τους επιτρέπεται μόνο εφόσον
                είναι αναγκαία για τη συναλλαγή και στο μέτρο που είναι αυτά αναγκαία και κατάλληλα/σχετικά για/με τους σκοπούς της συναλλαγής. Τα προσωπικά δεδομένα πρέπει να χρησιμοποιούνται μόνο για τον σκοπό για τον οποίο συλλέγονται και να διατηρούνται μόνο όσο είναι αναγκαίο για τους
                σκοπούς της συγκεκριμένης συναλλαγής.</p>

            <p>Συλλογή και επεξεργασία προσωπικών δεδομένων που δεν εντάσσονται σε συγκεκριμένη συναλλαγή μπορεί να γίνει μόνο με τη ρητή συγκατάθεσή σας, αφού προηγουμένως ενημερωθείτε για τον σκοπό, τις κατηγορίες των δεδομένων
                κ.λπ.. Η προηγούμενη συγκατάθεσή σας είναι απαραίτητη και στην περίπτωση που το ηλεκτρονικό κατάστημα ή ηλεκτρονική επιχείρηση θέλει να διαβιβάσει τα δεδομένα που σας αφορούν σε τρίτους.</p>

            <p>Πρέπει να γνωρίζετε ότι η κάθε επίσκεψη σε ένα ηλεκτρονικό κατάστημα και κάθε συναλλαγή αφήνει ψηφιακά ίχνη. Αυτά τα ψηφιακά ίχνη χρησιμοποιούνται συχνά για την δημιουργία καταναλωτικού προφίλ. Η συλλογή των δεδομένων
                αυτών με τεχνολογίες όπως τα cookies εν αγνοία σας και χωρίς τη συγκατάθεσή σας συνιστά παράβαση του νόμου. Επιπλέον, μπορείτε να επιλέξετε να παραμείνετε ανώνυμος/η τόσο στην περιήγησή σας στο ηλεκτρονικό κατάστημα όσο και στην συναλλαγή σας (στο βαθμό που αυτό μπορεί να είναι
                εφικτό ως προς την υλοποίηση της συναλλαγής).</p>

            <h3 class="fw-bold fs-6 mb-3">Και εάν αυτό που θα παραλάβω δεν είναι τελικά αυτό που περίμενα;</h3>

            <p>Οποιαδήποτε αγορά μέσω του Διαδικτύου εμπίπτει στις διατάξεις των νόμων για την προστασία του καταναλωτή (Νόμος 2251/94). Αυτό σημαίνει πως έχετε δικαίωμα να επιστρέψετε το προϊόν (στην κατάσταση που το παραλάβατε) ή
                την υπηρεσία που αγοράσατε ακόμα και, στις περισσότερες περιπτώσεις, χωρίς να δώσετε εξήγηση, μέσα σε δέκα (10) εργάσιμες ημέρες, για τα αγαθά, από την ημερομηνία παραλαβής τους (χωρίς να ανοίξετε τη συσκευασία του και σύμφωνα με τις ειδικές ρυθμίσεις που ισχύουν για
                συγκεκριμένες κατηγορίες προϊόντων), και, για τις υπηρεσίες, από την ημερομηνία παραλαβής των εγγράφων που σας ενημερώνουν ότι έχει συναφθεί η σύμβαση αγοραπωλησίας. Βέβαια, το δικαίωμα αυτό (δικαίωμα υπαναχώρησης) ισχύει μόνον εφόσον αγοράζετε από χώρες της Ευρωπαϊκής Ένωσης (ΕΕ) ή
                τις χώρες του Ευρωπαϊκού Οικονομικού Χώρου (ΕΟΧ).</p>

            <p>Πρέπει να επισημανθεί πως όσον αφορά τις χρηματοοικονομικές υπηρεσίες, επίκειται σε κοινοτικό επίπεδο η έκδοση Οδηγίας για την εξ αποστάσεως εμπορία των υπηρεσιών αυτών. Σύμφωνα με τη υπάρχουσα Οδηγία 97/7/ΕΚ για την
                προστασία των καταναλωτών κατά τις εξ αποστάσεως συμβάσεις, εξαιρούνται ρητά από το πεδίο εφαρμογής της οι συμβάσεις που αφορούν χρηματοοικονομικές υπηρεσίες. Οι συμβάσεις αυτές, λόγω των ιδιαιτεροτήτων και της πολυπλοκότητας που συχνά παρουσιάζουν, σε συνάρτηση με τον μη υλικό
                χαρακτήρα και την πολυμορφία που τις διακρίνει, κρίθηκε, τελικά, από την Ευρωπαϊκή Επιτροπή ότι χρήζουν ειδικής ρύθμισης και δεν μπορούν να διέπονται από το γενικό πλαίσιο που διαμορφώθηκε για τις υπόλοιπες εξ αποστάσεως συμβάσεις. Κατά συνέπεια, στην υπό επεξεργασία πρόταση
                Οδηγίας προβλέπονται ειδικότερες ρυθμίσεις και ως προς το θέμα της υπαναχώρησης.</p>

            <h3 class="fw-bold fs-6 mb-3">Ακούγεται ότι δεν έχει ακόμα δημιουργηθεί στην Ελλάδα το θεσμικό πλαίσιο για το ηλεκτρονικό εμπόριο. Τελικά υπάρχουν νόμοι που με προστατεύουν;</h3>

            <p>Ναι, υπάρχουν. Το ηλεκτρονικό εμπόριο είναι και αυτό μία μορφή εμπορίου και συνεπώς βρίσκουν σε αυτό εφαρμογή όλες οι κοινοτικές οδηγίες (κοινοτικό δίκαιο) και οι εθνικές διατάξεις για την προστασία του καταναλωτή που
                αφορούν το εμπόριο γενικότερα. Για παράδειγμα, ο Νόμος 2251/94 που προαναφέρθηκε για την "Προστασία των καταναλωτών" περιέχει διατάξεις για τις συμβάσεις από απόσταση (Άρθρο 4) που εφαρμόζονται και στην περίπτωση του ηλεκτρονικού εμπορίου.</p>

            <p>Ως προς τα προσωπικά δεδομένα, υπάρχει ένα πλαίσιο δεσμευτικών κανόνων που συγκροτείται από τον Ν. 2472/97 (για την προστασία ατόμου από την επεξεργασία δεδομένων προσωπικού χαρακτήρα) και τον Ν. 2774/99 (για την
                προστασία δεδομένων προσωπικού χαρακτήρα στον τηλεπικοινωνιακό τομέα). Μπορείτε να διαβάσετε τους Νόμους αυτούς στην ηλεκτρονική διεύθυνση της Αρχής Προστασίας Προσωπικών Δεδομένων ( http://www.dpa.gr).</p>

            <p>Η αντιμετώπιση των ζητημάτων που προκύπτουν από την παράνομη χρήση του Διαδικτύου γίνεται σήμερα με εφαρμογή των νομικών διατάξεων που καλύπτουν τις παραδοσιακές συναλλαγές, ενώ γίνεται χρήση και των ειδικών νόμων για τις τηλεπικοινωνίες (Ν. 2246/1994).</p>

            <p>Επιπλέον, έχει εκδοθεί πρόσφατα το Προεδρικό Διάταγμα 150/2001 ΦΕΚ Α 125 για τις ηλεκτρονικές υπογραφές, ενώ βρίσκεται σε τελικό στάδιο το Προεδρικό Διάταγμα για το ηλεκτρονικό εμπόριο με έμφαση στην εξώδικη επίλυση
                διαφορών, τη συνεργασία των κρατών-μελών για την επίλυση των προβλημάτων των καταναλωτών, τη θέσπιση κανόνων δεοντολογίας με υποχρεωτική ισχύ για τους αποδέκτες τους, την ευθύνη των ενδιαμέσων, τη σύναψη των ηλεκτρονικών συμβάσεων, τις πληροφορίες που πρέπει να παρέχονται πριν τη
                σύναψη των ηλεκτρονικών συμβάσεων, τις πληροφορίες που πρέπει να παρέχονται στις εμπορικές επικοινωνίες (διαφημιστικά, χορηγίες, προσφορές, κ.λπ.), τον τόπο εγκατάστασης των φορέων παροχής υπηρεσιών. Με το συγκεκριμένο αυτό νομικό πλαίσιο θα μπορούν οι επιχειρήσεις και οι
                καταναλωτές να αξιοποιούν με τον καλύτερο τρόπο τις δυνατότητες του ηλεκτρονικού εμπορίου.</p>

            <h3 class="fw-bold fs-6 mb-3">Και όταν αγοράζω από το εξωτερικό; Τι πρέπει να προσέχω; Ποιοι νόμοι με προστατεύουν;</h3>

            <p>Δεν υπάρχει ακόμη ένα συνεκτικό νομοθετικό-κανονιστικό πλαίσιο για το ηλεκτρονικό εμπόριο που να εφαρμόζεται σε όλες τις χώρες. Ο καταναλωτής, όταν αγοράζει από χώρες εκτός της ΕΕ, πριν προβεί σε οποιαδήποτε αγορά,
                πρέπει να αναζητήσει τις πληροφορίες που διαθέτει ο έμπορος στο ηλεκτρονικό του κατάστημα. Μπορεί να ζητήσει από τον έμπορο και άλλες πληροφορίες, εάν αυτές που υπάρχουν δεν τον ικανοποιούν. Επίσης, θα πρέπει να προτιμούνται ηλεκτρονικά καταστήματα που έχουν την έγκριση ή και
                πιστοποίηση γνωστών δημοσίων ή ιδιωτικών οργανισμών.</p>

            <h3 class="fw-bold fs-6 mb-3">Οι πληροφορίες αυτές, πρέπει να συμπεριλαμβάνουν τα παρακάτω:</h3>

            <p>Πραγματική ταυτότητα του εμπόρου (όνομα, γεωγραφική διεύθυνση κ.λπ..) Τρόποι επικοινωνίας με τον έμπορο ηλεκτρονικά και παραδοσιακά (ηλεκτρονικό ταχυδρομείο-email, Φαξ, τηλέφωνο, κ.λπ..) Τελική τιμή του προϊόντος ή της
                υπηρεσίας (φόροι, έξοδα αποστολής, κ.λπ..) Εγγύηση του προϊόντος. Μέθοδος αποστολής και χρόνος παράδοσης, δυνατότητα υπαναχώρησης, τρόπος πληρωμής και παράδοσης, κ.λπ.. Τρόπος ακύρωσης της παραγγελίας σε περίπτωση λάθους ή αλλαγής γνώμης. Επιβεβαίωση της παραλαβής της
                παραγγελίας. Πληροφορίες για την προστασία των προσωπικών δεδομένων (εάν μετά τη συναλλαγή θα διαγραφούν τα στοιχεία του από τη λίστα του εμπόρου, εάν δεν περάσουν σε άλλες εταιρίες, κ.λπ..) Που απευθύνεται για τα παράπονα του. Εάν κάτι δεν πάει καλά (π.χ. αργοπορημένη παράδοση ή
                καθόλου παράδοση.) Πως θα επιστραφεί το προϊόν, πρόσθετα έξοδα για την επιστροφή, κ.λπ..) Ποιο δικαστήριο είναι αρμόδιο και ποιο Δίκαιο θα εφαρμοσθεί σε περίπτωση διαφοράς.</p>

            <p>Για τις χώρες της Ευρωπαϊκής Ένωσης ο καταναλωτής θα μπορεί να απευθυνθεί στο δικαστήριο του τόπου κατοικίας του στην περίπτωση διαφοράς που προέκυψε με αλλοδαπό έμπορο ή εταιρία. (άρθρο 15c του κανονισμού που
                αναθεώρησε την Σύμβαση των Βρυξελλών για την δωσιδικία, ΕΕΚ L 012, 16/01/2001, που πρόκειται να ισχύσει στο προσεχές διάστημα). Το δε Δίκαιο που θα εφαρμοστεί από το δικαστήριο καθορίζεται από τη Σύμβαση της Ρώμης (ΕΕΚ C 1997) και στις περισσότερες περιπτώσεις είναι το Δίκαιο της
                χώρας του καταναλωτή, καθώς επίσης και οι Οδηγίες για την προστασία του καταναλωτή και οι αναγκαστικού δικαίου διατάξεις που εφαρμόζονται υποχρεωτικά σύμφωνα με το ελληνικό δίκαιο. Πολύ σύντομα οι περισσότερες χώρες της Ευρωπαϊκής Ένωσης θα διαθέτουν την δυνατότητα εξωδικαστικής
                επίλυσης των διαφορών (διαδικασία διαμεσολάβησης) που προκύπτουν από ηλεκτρονικές εμπορικές συναλλαγές σε εθνικό και διασυνοριακό επίπεδο. Το σύστημα αυτό (ΕΕJ-NET) θα έχει ως αποτέλεσμα την αποφυγή των δικαστικών εξόδων και την ταχύτερη επίλυση των διαφορών.</p>

            <h3 class="fw-bold fs-6 mb-3">Πού μπορώ να απευθυνθώ εάν έχω το οποιοδήποτε πρόβλημα με κάποιο ηλεκτρονικό κατάστημα;</h3>

            <p>Ανάλογα με τη φύση του προβλήματος που προέκυψε μπορείτε να απευθυνθείτε:</p>
            <p>Κατ' αρχήν στο ίδιο το εμπορικό κατάστημα από το οποίο αγοράσατε. Στον επαγγελματικό σύλλογο που εκπροσωπεί τον κλάδο του εμπόρου. Στο Επιμελητήριο του ηλεκτρονικού καταστήματος. Στην υπηρεσία προστασίας του καταναλωτή
                του Υπουργείου Ανάπτυξης (τηλ. γραμμή 1720). Στις επιτροπές 'φιλικού διακανονισμού' στις Νομαρχίες όλης της Ελλάδος. Στην υπηρεσία πελατών ή στην εκδίδουσα Διεύθυνση της Τράπεζας από την οποία πήρατε την πιστωτική σας κάρτα. Στον Τραπεζικό Μεσολαβητή (τηλ. 210-3376700). Στην Αρχή
                Προστασίας Προσωπικών Δεδομένων (τηλ. 210-3352602-5). Στις Ενώσεις Καταναλωτών. Υπάρχουν 44 σε όλη την Ελλάδα. Ενδεικτικά παραθέτουμε τις 4 μεγαλύτερες: ΕΚΑΤΟ (τηλ. 2310-857007 ή 2310-866800), ΕΚΠΟΙΖΩ (τηλ. 210-3304444), ΙΝΚΑ (τηλ. 210-9829152 ή 210-9888937), ΚΕΠΚΑ (τηλ.
                2310-269449). Στον Συνήγορο του Πολίτη (τηλ. 210-7283664). Και φυσικά ... στο δικηγόρο σας.</p>

            <h3 class="fw-bold fs-6 mb-3">Έχοντας διαβάσει τα παραπάνω, μπορώ πλέον να εμπιστευθώ και να αγοράσω ότι θέλω από οποιοδήποτε ηλεκτρονικό κατάστημα;</h3>

            <p>Οι συμβουλές του Δεκάλογου για το τι πρέπει να προσέξετε και για το που πρέπει να απευθυνθείτε δεν μπορούν να καλύψουν όλες τις περιπτώσεις και δεν μπορούν να υποκαταστήσουν σε καμία περίπτωση τη σύμβαση που θα συνάψετε με το ηλεκτρονικό κατάστημα για τη συγκεκριμένη αγορά.
                Σε κάθε αγορά θα πρέπει να κοιτάξετε προσεκτικά τους όρους της σύμβασης που θα συνάψετε, οι οποίοι θα πρέπει να αναφέρονται με σαφήνεια. Είναι σημαντικό να διαβάσετε προσεκτικά τους όρους συναλλαγής και να μη δίνετε εύκολα τη συγκατάθεσή σας (κάνοντας κλικ στο Συμφωνώ/Agree της
                σύμβασης).</p>
        </div>
    </div>
@endsection
