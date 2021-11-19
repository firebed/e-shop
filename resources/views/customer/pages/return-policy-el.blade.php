@extends('eshop::customer.pages.master', [
    'title' => __("Return policy"),
    'description' => __("Return policy")
])

@php
    $url = env('APP_URL');
    $base = basename($url);
    $link = "<a href='$url'>$base</a>";

    $address = __("company.address");
@endphp

@section('main')
    <div class="container-fluid py-4 bg-white">
        <div class="container">
            <h1 class="fs-3 mb-3">Πολιτική επιστροφών</h1>

            <h2 class="fs-4 mb-3 mt-5">Πώς επιστρέφω προϊόντα;</h2>

            <p>Σε περίπτωση που επιθυμείς να επιστρέψεις το προϊόν που έχεις αγοράσει, έχεις τη δυνατότητα να το κάνεις με 2 τρόπους εντός 15 ημερολογιακών ημερών από την ημέρα που το παρέλαβες! (Απαραίτητη προϋπόθεση το προϊόν να βρίσκεται στην κλειστή εμπορική του συσκευασία και να συνοδεύεται από
                την απόδειξη αγοράς)</p>

            <ol>
                <li>Παραδίδοντας το/τα στην αρχική κατάσταση και συσκευασία στο κατάστημα μας που βρίσκετε στη διεύθυνση {{ $address }} προσκομίζοντας το μαζί με την απόδειξη αγοράς!</li>
                <li>Αποστέλλοντας το/τα με δικά σου έξοδα, στην αρχική του κατάσταση και συσκευασία, στο κατάστημα μας που βρίσκετε στη διεύθυνση {{ $address }} εσωκλείοντας την απόδειξη αγοράς.</li>
            </ol>

            <h2 class="fs-4 mb-3 mt-5">Παρέλαβα προϊόντα από το {!! $link !!}, αλλά ένα προϊόν είναι ελαττωματικό,έχει ελλιπή συσκευασία, ή είναι λάθος προϊόν. Τι να κάνω;</h2>

            <p>Εάν κάποιο προϊόν δεν είναι σύμφωνα με τις προδιαγραφές του κατασκευαστή μπορείς να επικοινωνήσεις μαζί μας για να μας ενημερώσεις για την επίλυση του προβλήματος.</p>
        </div>
    </div>
@endsection