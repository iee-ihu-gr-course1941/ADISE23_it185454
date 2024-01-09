# ADISE23_it185454
## STRATEGO

ΠΕΡΙΕΧΟΜΕΝΑ
=================
   * [Εισαγωγή](#εισαγωγή)
   * [Εγκατάσταση Απαιτούμενων](#εγκατάσταση-απαιτούμενων)
      * [Απαιτήσεις](#απαιτήσεις)
   * [Οδηγίες Εγκατάστασης](#οδηγίες-εγκατάστασης)
   * [Περιγραφή Παιχνιδιού](#περιγραφή-παιχνιδιού)
      * [Κανόνες](#κανόνες)
         * [Μετακίνηση](#μετακίνηση)
         * [Επίθεση](#επίθεση)
         * [Στόχος Παιχνιδιού](#στόχος-παιχνιδιού)
      * [Βάση Δεδομένων](#βάση-δεδομένων)
         * [Πίνακες](#πίνακες)
         * [Διεργασίες](#διεργασίες)
         * [Εναύσματα](#εναύσματα)
   * [Περιγραφή API](#περιγραφή-api)
      * [Methods](#methods)
         * [Board](#board)
            * [Ανάγνωση Board](#ανάγνωση-board)
            * [Αρχικοποίηση Board](#αρχικοποίηση-board)
         * [Piece](#piece)
            * [Ανάγνωση Θέσης/Πιονιού](#ανάγνωση-θέσηςπιονιού)
            * [Μεταβολή Θέσης Πιονιού](#μεταβολή-θέσης-πιονιού)
         * [Player](#player)
            * [Ανάγνωση στοιχείων παίκτη](#ανάγνωση-στοιχείων-παίκτη)
            * [Καθορισμός στοιχείων παίκτη](#καθορισμός-στοιχείων-παίκτη)
         * [Status](#status)
            * [Ανάγνωση κατάστασης παιχνιδιού](#ανάγνωση-κατάστασης-παιχνιδιού)

# Εισαγωγή
Η εργασία Stratego εκπονήθηκε στα πλαίσια του μαθήματος Ανάπτυξη Διαδικτυακών Συστημάτων και Εφαρμογών. Στόχος είναι η δυνατότητα δύο ανθρώπων να απολαύσουν το επιτραπέζιο παιχνίδι με την χρήση του υπολογιστή. Σκοπός της εργασίας αυτής είναι η δημιουργία του επιτραπέζιου παιχνιδιού Stratego, με απαιτήσεις την ανάπτυξη ενός Web API  το οποίο εκτελείται μέσω Command Prompt (CMD) με cURL εντολές (Client URL). Η κατασκευή του παιχνιδιού έγινε με τη χρήση της γλώσσας προγραμματισμού PHP (Hypertext Preprocessor) σε συνδυασμό με την mySQL για την δημιουργία του API (Application Programming Interface) και της βάσης δεδομένων αντίστοιχα. Για την κατασκευή της βάσης χρησιμοποιήθηκε το περιβάλλον της HeidiSQL. Τέλος, η δημιουργία και εκτέλεση των HTTP Requests, με τα οποία παίζεται το παιχνίδι, υλοποιήθηκε στο Postman (API Platform).

# Εγκατάσταση Απαιτούμενων
Για την πρόσβαση ενός χρήστη στο παιχνίδι, είναι απαραίτητες οι εγκαταστάσεις κάποιων προγραμμάτων και εργαλείων στον προσωπικό του υπολογιστή. Αρχικά, πρέπει να είναι εγκατεστημένο το XAMPP (πακέτο λογισμικού ανοιχτού κώδικα το οποίο παρέχει ένα τοπικό περιβάλλον web server). Από τις υπηρεσίες του XAMPP, πρέπει να είναι εγκατεστημένες το Apache (εργαλείο ανοικτού κώδικα που χρησιμοποιείται για την τοπική εκτέλεση εφαρμογών PHP) και η MySQL (σύστημα διαχείρισης βάσεων δεδομένων). Ακόμα, πρέπει να είναι εγκατεστημένη η PHP και τέλος το cURL, ένα εργαλείο γραμμής εντολών που χρησιμοποιούν οι προγραμματιστές για τη μεταφορά δεδομένων από και προς ένα server.

## Απαιτήσεις
* Apache2
* Mysql Server
* php
* cURL

## Οδηγίες Εγκατάστασης
 * Κάντε clone το project σε κάποιον φάκελο <br/>
  `$ git clone https://github.com/iee-ihu-gr-course1941/ADISE23_it185454.git`

 * Βεβαιωθείτε ότι ο φάκελος είναι προσβάσιμος από τον Apache Server. Για να γίνει αυτό αρκεί να μεταβείτε στο configuration αρχείο (httpd-xampp.conf) του Apache, μέσα από το XAMPP, και να συμπληρωθεί στο τέλος το παρακάτω κείμενο:
```
  Alias /stratego "C:/ProjectAdise/ADISE23_it185454/webfiles"
    <Directory "C:/ProjectAdise/ADISE23_it185454/webfiles">
    	AllowOverride All
    	Require all granted
    </Directory>
 ```
Όπου  υπάρχει το path (C:/ProjectAdise/ADISE23_it185454/webfiles), ο χρήστης πρέπει να το αντικαταστήσει με το δικό του path, τον φάκελο που έκανε την κλονοποίηση. 
 * Θα πρέπει να δημιουργήσετε στην Mysql την βάση με όνομα 'stratego' και να φορτώσετε σε αυτήν την βάση τα δεδομένα από το αρχείο schema.sql 
 * Θα πρέπει να φτιάξετε το αρχείο library/db_upass.php το οποίο να περιέχει:
```
    <?php
	$DB_PASS = 'κωδικός';
	$DB_USER = 'όνομα χρήστη';
    ?>
```

# Περιγραφή Παιχνιδιού
## Κανόνες
Το stratego είναι ένα στρατηγικό παιχνίδι μάχης δύο στρατών. Το ταμπλό του παιχνιδιού περιέχει 100 θέσεις, εκ των οποίων οι 8 είναι λίμνες, όπου δεν έχει πρόσβαση κανένα πιόνι. Όλα ξεκινάνε όταν οι δύο παίχτες (κόκκινος, μπλε) τοποθετήσουν από 40 πιόνια, ο καθένας, στο ταμπλό. Ο κάθε παίκτης επιλέγει την στρατηγική του και τις θέσεις που θα τοποθετήσει το κάθε του πιόνι. Οι θέσεις αυτές παραμένουν κρυφές από τον αντίπαλο. Ο κόκκινος τοποθετεί τα πιόνια του πρώτος στις πρώτες 4 σειρές, ενώ ο μπλε τα τοποθετεί με τη σειρά του στις 4 τελευταίες. 
Τα πιόνια τα οποία καλούνται να τοποθετήσουν είναι: 
* (1) – 1 x Marshal, Στρατάρχης
* (2) – 1 x General, Στρατηγός
* (3) – 2 x Colonel, Συνταγματάρχης
* (4) – 3 x Major, Ταγματάρχης
* (5) – 4 x Captain, Λοχαγός
* (6) – 4 x Lieutenant, Υπολοχαγός
* (7) – 4 x Sergeant, Λοχίας
* (8) – 5 x Miner, Πυροτεχνουργός
* (9) – 8 x Scout, Ανιχνευτής
* (B) – 6 x Bomb, Βόμβα
* (F) – 1 x Flag, Σημαία
* (S) – 1 x Spy, Κατάσκοπος

Το κάθε πιόνι έχει από έναν βαθμό (το σύμβολο της παρένεθσης). Όσο πιο μικρός είναι ο βαθμός τόσο πιο δυνατό είναι το πιόνι.
Το παιχνίδι αρχίζει με τον κόκκινο να κάνει την πρώτη κίνηση. Ο κάθε παίκτης πρέπει να μετακινήσει ένα από τα δικά του πιόνια ή να επιτεθεί σε ένα από τα πιόνια του αντιπάλου του. Η μετακίνηση και η επίθεση πρέπει να ακολουθούν τους παρακάτω κανόνες:

### Μετακίνηση
* Το κάθε πιόνι μπορεί να μετακινηθεί κατά μία θέση μόνο με 4 διαφορετικούς πιθανούς προορισμούς (ευθεία, πίσω, αριστερά ή δεξιά). Μοναδική προυπόθεση να μην υπάρχει εμπόδιο στον επιθυμητό προορισμό και αυτός να είναι εντός του ταμπλό. Ως εμπόδιο χαρακτηρίζεται ένα τετράγωνο που αντιστοιχεί σε λίμνη, ένα τετράγωνο που υπάρχει τοποθετημένο πιόνι ίδιου χρώματος. 
* Εξαίρεση της μετακίνησης αποτελεί το πιόνι (9) ή αλλιώς Scout, το οποίο μπορεί να μετακινηθεί απεριόριστα κενά τετράγωνα σε ευεθεία γραμμή.
* Δεν επιτρέπεται η διαγώνια μετακίνηση, η μετακίνηση πάνω από τις λίμνες ή η αναπήδηση πάνω από κάποιο άλλο πιόνι.
* Η σημαία (F) και οι βομβες (B) δεν μπορούν να μετακινηθούν ποτέ αφότου τοποθετηθούν στο ταμπλό.

### Επίθεση
* Κατά την μετακίνηση, εάν ο προορισμός συμπίπτει με ένα τετράγωνο που είναι κατηλλημένο από ένα πιόνι αντιπάλου, τότε ξεκινάει η μάχη των 2 πιονιών. Αμέσως αποκαλείπτεται ο βαθμός κάθε πιονιού.
* Το πιόνι με τον χαμηλότερο βαθμό χάνει και αφαιρείται από το ταμπλό.
* Αν και τα 2 πιόνια έχουν ίδιο βαθμό, αφαιρούνται και τα 2 από το ταμπλό.
* Αν κερδίσει το επιτιθέμενο πιόνι, αντικαθιστά το πιόνι του ηττημένου πιονιού.
* Αν κερδίσει το αμυνόμενο πιόνι, παραμένει στη θέση του ενώ το επιτιθέμενο αφαιρείται από το ταμπλό.
* Οποιοδήποτε πιόνι κάνει επίθεση στο πιόνι (F) Flag, νικάει την μάχη.
* Οποιοδήποτε πιόνι κάνει επίθεση στο πιόνι (B) Bomb, χάνει την μάχη (εξαίρεση του κανόνα αυτού αποτελεί το πιόνι (8) Miner).
* Αν το επιτιθέμενο πιόνι είναι το (8) Miner και κάνει επίθεση σε βόμβα, τότε κερδίζει τη μάχη, καθώς ο μοναδικός σκοπός του (8) Miner είναι να απενεργοποιήσει την βόμβα.
*  Οποιοδήποτε πιόνι κάνει επίθεση σε (S) Spy, νικάει τη μάχη.
* Αν το επιτιθέμενο πιόνι είναι το (S) Spy και το αμυνόμενο ειναι το (1) Marshal, τότε το (S) Spy νικάει τη μάχη. Ο μοναδικός σκοπός του κατάσκοπου είναι να ανακαλύψει την θέση του στρατάρχη και να τον εξολοθρεύσει. 

### Στόχος Παιχνιδιού
Στόχος του παιχνιδιού είναι ο στρατός κάποιου παίκτη να κερδίσει την μάχη. Αυτό μπορεί να επιτευχθεί με δύο τρόπους. 
* Καταφέρνοντας να κατακτήσει την σημαία του αντιπάλου.
* Καταφέρνοντας να φτάσει τον αντίπαλο σε σημείο που τα πιόνια του δεν μπορούν να μετακινηθούν.

# Βάση Δεδομένων
Η βάση δεδομένων που δημιουργήθηκε για το project 5 Tables, 7 Procedures και 1 Trigger. 
## Πίνακες
Ο πίνακας με όνομα "board" αποτελείται από 5 πεδία και αναπαριστά το ταμπλό του παιχνιδιού.
### board
---------
| Attribute                | Description                                  | Values                              |
| ------------------------ | -------------------------------------------- | ----------------------------------- |
| `x`                      | H συντεταγμένη x του τετραγώνου              | 1..10                                |
| `y`                      | H συντεταγμένη y του τετραγώνου              | 1..10                                |
| `b_color`                | To χρώμα του τετραγώνου                      | 'GR','GY'                             |
| `piece_color`            | To χρώμα του πιονιού                         | 'B','R', null                       |
| `piece`                  | To πιόνι που υπάρχει στο τετράγωνο           | '1', '2', '3', '4', '5', '6', '7', '8', '9', 'B', 'F', 'S', null       |
| `moves`                  | Πίνακας με τα δυνατά τετράγωνα (x,y) που μπορεί να μετακινηθεί το τρέχον πιόνι. Αν δεν έχει γίνει αυθεντικοποίηση του παίκτη ή δεν έχει ξεκινήσει το παιχνίδι ή δεν είναι η σειρά του παίκτη να παίξει ή δεν υπάρχει πιόνι ή δεν υπάρχουν κινήσεις, τότε το πεδίο δεν υπάρχει. |   |

Ο πίνακας με όνομα "board_full" αποτελείται από 5 πεδία και δημιουργήθηκε για τους σκοπούς της παρουσίασης του project και έχει την ίδια δομη με τον πίνακα  "board". Τον χρησιμοποιούμε για να γεμίσουμε αυτόματα με προεπιλεγμένες τιμές το ταμπλό του παιχνιδιού, αποφεύγοντας την διαδικασία της τοποθέτησης των πιονιών.

Ο πίνακας με όνομα "board_start" αποτελείται από 5 πεδία και δημιουργήθηκε για να καλείται στο τέλος ενός παιχνιδιού. Με τον τερματισμό του τρέχοντος παιχνιδιού, προεκιμένου να ξεκινήσει ένα καινούριο, αντί να γίνονται πολλαπλά updates στον πίνακα "board" (για να αφαιρούνται τα πιόνια από το ταμπλό), αντικαθιστούμε τον πίνακα της βάσης με τον πίνακα "board_start". Αυτος έχει αρχικοποιηθεί με όλες τις τιμές στα πεδία "piece_color" και "piece" να είναι null. Έτσι, όταν ξεκινάει ένα καινούριο παιχνίδι, το ταμπλό θα είναι αδειο.

Ο πίνακας με όνομα "players" αποτελείται από 3 πεδία και αποθηκεύει τα στοιχεία του κάθε παίκτη.
### players
---------
| Attribute                | Description                                  | Values                              |
| ------------------------ | -------------------------------------------- | ----------------------------------- |
| `username`                      | Όνομα παίκτη              | String                                |
| `piece_color`                      | Το χρώμα των πιονιών του παίκτη              | 'B','R'                                |
| `token`                | Το κρυφό token του παίκτη. Επιστρέφεται μόνο την στιγμή της εισόδου του παίκτη στο παιχνίδι                      | HEX                             |

Ο πίνακας με όνομα "game_status" αποτελείται από 4 πεδία και αποθηκεύει την κατάσταση που βρίσκεται το παιχνίδι στην κάθε φάση, τον παίκτη που έχει σειρά να παίξει, το αποτέλεσμα του παιχνιδιού και την τελευταία αλλαγή που έγινε στον πίνακα.
### game_status
---------
| Attribute                | Description                                  | Values                              |
| ------------------------ | -------------------------------------------- | ----------------------------------- |
| `status`                      | Κατάσταση παιχνιδιού              | 'not active', 'initialized', 'piece_positioning', 'started', 'ended', 'aborded'                                |
| `p_turn`                      | Το χρώμα των πιονιών του παίκτη              | 'B','R', null                                |
| `result`                | Το χρώμα του παίκτη που κέρδισε το παιχνίδι                      | 'B','R', null                             |
| `last_change`            | Τελευταία αλλαγή / ενέργεια στην κατάσταση του παιχνιδιού                         | 'B','R', null                       |


# Περιγραφή API

## Methods


### Board
#### Ανάγνωση Board

```
GET /board/
```

Επιστρέφει το [Board](#Board).

#### Αρχικοποίηση Board
```
POST /board/
```

Αρχικοποιεί το Board, δηλαδή το παιχνίδι. Γίνονται reset τα πάντα σε σχέση με το παιχνίδι.
Επιστρέφει το [Board](#Board).

### Piece
#### Ανάγνωση Θέσης/Πιονιού

```
GET /board/piece/:x/:y/
```

Κάνει την κίνηση του πιονιού από την θέση x,y στην νέα θέση. Προφανώς ελέγχεται η κίνηση αν είναι νόμιμη καθώς και αν είναι η σειρά του παίκτη να παίξει με βάση το token.
Επιστρέφει τα στοιχεία από το [Board](#Board-1) με συντεταγμένες x,y.
Περιλαμβάνει το χρώμα του πιονιού και τον τύπο.

#### Μεταβολή Θέσης Πιονιού

```
PUT /board/piece/:x/:y/
```
Json Data:

| Field             | Description                 | Required   |
| ----------------- | --------------------------- | ---------- |
| `x`               | Η νέα θέση x                | yes        |
| `y`               | Η νέα θέση y                | yes        |

Επιστρέφει τα στοιχεία από το [Board](#Board-1) με συντεταγμένες x,y.
Περιλαμβάνει το χρώμα του πιονιού και τον τύπο


### Player

#### Ανάγνωση στοιχείων παίκτη
```
GET /players/:p
```

Επιστρέφει τα στοιχεία του παίκτη p ή όλων των παικτών αν παραληφθεί. Το p μπορεί να είναι 'B' ή 'W'.

#### Καθορισμός στοιχείων παίκτη
```
PUT /players/:p
```
Json Data:

| Field             | Description                 | Required   |
| ----------------- | --------------------------- | ---------- |
| `username`        | Το username για τον παίκτη p. | yes        |
| `color`           | To χρώμα που επέλεξε ο παίκτης p. | yes        |


Επιστρέφει τα στοιχεία του παίκτη p και ένα token. Το token πρέπει να το χρησιμοποιεί ο παίκτης καθόλη τη διάρκεια του παιχνιδιού.

### Status

#### Ανάγνωση κατάστασης παιχνιδιού
```
GET /status/
```

Επιστρέφει το στοιχείο [Game_status](#Game_status).



## Entities


### Board
---------

Το board είναι ένας πίνακας, ο οποίος στο κάθε στοιχείο έχει τα παρακάτω:


| Attribute                | Description                                  | Values                              |
| ------------------------ | -------------------------------------------- | ----------------------------------- |
| `x`                      | H συντεταγμένη x του τετραγώνου              | 1..8                                |
| `y`                      | H συντεταγμένη y του τετραγώνου              | 1..8                                |
| `b_color`                | To χρώμα του τετραγώνου                      | 'B','W'                             |
| `piece_color`            | To χρώμα του πιονιού                         | 'B','W', null                       |
| `piece`                  | To Πιόνι που υπάρχει στο τετράγωνο           | 'K','Q','R','B','N','P', null       |
| `moves`                  | Πίνακας με τα δυνατά τετράγωνα (x,y) που μπορεί να μετακινηθεί το τρέχον πιόνι. Αν δεν υπάρχει πιόνι, ή δεν έχει κάνει login ο χρήστης, ή δεν έχει ξεκινήσει το παιχνίδι ή αν δεν υπάρχουν κινήσεις, τότε το πεδίο δεν υπάρχει. |   |


### Players
---------

O κάθε παίκτης έχει τα παρακάτω στοιχεία:


| Attribute                | Description                                  | Values                              |
| ------------------------ | -------------------------------------------- | ----------------------------------- |
| `username`               | Όνομα παίκτη                                 | String                              |
| `piece_color`            | To χρώμα που παίζει ο παίκτης                | 'B','W'                             |
| `token  `                | To κρυφό token του παίκτη. Επιστρέφεται μόνο τη στιγμή της εισόδου του παίκτη στο παιχνίδι | HEX |


### Game_status
---------

H κατάσταση παιχνιδιού έχει τα παρακάτω στοιχεία:


| Attribute                | Description                                  | Values                              |
| ------------------------ | -------------------------------------------- | ----------------------------------- |
| `status  `               | Κατάσταση             | 'not active', 'initialized', 'started', 'ended', 'aborded'     |
| `p_turn`                 | To χρώμα του παίκτη που παίζει        | 'B','W',null                              |
| `result`                 |  To χρώμα του παίκτη που κέρδισε |'B','W',null                              |
| `last_change`            | Τελευταία αλλαγή/ενέργεια στην κατάσταση του παιχνιδιού         | timestamp |
