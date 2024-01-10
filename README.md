# ADISE23_it185454
## Μαρία Πάππα 
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
      * [Απαιτήσεις που υλοποιήθηκαν](#απαιτήσεις-που-υλοποιήθηκαν)
   * [Περιγραφή API](#περιγραφή-api)
      * [Methods](#methods)
         * [Board](#board)
            * [Ανάγνωση board](#ανάγνωση-board)
            * [Άδειασμα board](#άδειασμα-board)
            * [Αυτοματοποιημένο γέμισμα board](#αυτοματοποιημένο-γέμισμα-board)
       	 * [Players](#players)
            * [Ανάγνωση στοιχείων players](#ανάγνωση-στοιχείων-players)
            * [Ανάγνωση στοιχείων player](#ανάγνωση-στοιχείων-player)
            * [Καθορισμός στοιχείων player](#καθορισμός-στοιχείων-player)
         * [Piece](#piece)
            * [Εμφάνιση θέσης πιονιού](#εμφάνιση-θέσης-πιονιού)
            * [Τοποθέτηση πιονιού](#τοποθέτηση-πιονιού)
            * [Μεταβολή θέσης πιονιού](#μεταβολή-θέσης-πιονιού)
         * [Status](#status)
            * [Εμφάνιση κατάστασης παιχνιδιού](#εμφάνιση-κατάστασης-παιχνιδιού)
         * [Exit](#exit)
            * [Τερματισμός παιχνιδιού](#τερματισμός-παιχνιδιού)

# Εισαγωγή
Η εργασία Stratego εκπονήθηκε στα πλαίσια του μαθήματος Ανάπτυξη Διαδικτυακών Συστημάτων και Εφαρμογών. Στόχος είναι η δυνατότητα δύο ανθρώπων να απολαύσουν το επιτραπέζιο παιχνίδι με την χρήση του υπολογιστή. Σκοπός της εργασίας αυτής είναι η δημιουργία του επιτραπέζιου παιχνιδιού Stratego, με απαιτήσεις την ανάπτυξη ενός Web API  το οποίο εκτελείται μέσω Command Prompt (CMD) με cURL εντολές (Client URL). Η κατασκευή του παιχνιδιού έγινε με τη χρήση της γλώσσας προγραμματισμού PHP (Hypertext Preprocessor) σε συνδυασμό με την MySQL, για την δημιουργία του API (Application Programming Interface) και της βάσης δεδομένων αντίστοιχα. Για την κατασκευή της βάσης χρησιμοποιήθηκε το περιβάλλον της HeidiSQL. Τέλος, η δημιουργία και η εκτέλεση των HTTP Requests, με τα οποία παίζεται το παιχνίδι, υλοποιήθηκαν στο Postman (API Platform).

# Εγκατάσταση Απαιτούμενων
Για την πρόσβαση ενός χρήστη στο παιχνίδι, είναι απαραίτητες οι εγκαταστάσεις κάποιων προγραμμάτων και εργαλείων στον προσωπικό του υπολογιστή. Αρχικά, πρέπει να είναι εγκατεστημένο το XAMPP (πακέτο λογισμικού ανοιχτού κώδικα το οποίο παρέχει ένα τοπικό περιβάλλον web server). Από τις υπηρεσίες του XAMPP, πρέπει να είναι εγκατεστημένες το Apache (εργαλείο ανοικτού κώδικα που χρησιμοποιείται για την τοπική εκτέλεση εφαρμογών PHP) και η MySQL (σύστημα διαχείρισης βάσεων δεδομένων). Ακόμα, πρέπει να είναι εγκατεστημένη η PHP και τέλος το cURL, ένα εργαλείο γραμμής εντολών που χρησιμοποιούν οι προγραμματιστές για τη μεταφορά δεδομένων από και προς έναν server.

## Απαιτήσεις
* Apache2
* MySQL Server
* PHP
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
 * Θα πρέπει να δημιουργήσετε στην MySQL την βάση με όνομα 'stratego' και να φορτώσετε σε αυτήν, τα δεδομένα από το αρχείο schema.sql . 
 * Θα πρέπει να φτιάξετε το αρχείο library/db_upass.php το οποίο να περιέχει:
```
    <?php
	$DB_PASS = 'κωδικός';
	$DB_USER = 'όνομα χρήστη';
    ?>
```

# Περιγραφή Παιχνιδιού
## Κανόνες
Το Stratego είναι ένα στρατηγικό παιχνίδι μάχης δύο στρατών. Το ταμπλό του παιχνιδιού περιέχει 100 θέσεις, εκ των οποίων οι 8 είναι λίμνες, όπου δεν έχει πρόσβαση κανένα πιόνι. Όλα ξεκινάνε όταν οι δύο παίκτες (κόκκινος, μπλε) τοποθετήσουν από 40 πιόνια, ο καθένας, στο ταμπλό. Ο κάθε παίκτης επιλέγει την στρατηγική του και τις θέσεις που θα τοποθετήσει το κάθε του πιόνι. Οι θέσεις αυτές παραμένουν κρυφές από τον αντίπαλο. Ο κόκκινος τοποθετεί τα πιόνια του πρώτος στις πρώτες 4 σειρές, ενώ ο μπλε τα τοποθετεί με τη σειρά του στις 4 τελευταίες. 
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

Το κάθε πιόνι έχει από έναν βαθμό (το σύμβολο της παρένθεσης). Όσο πιο μικρός είναι ο βαθμός τόσο πιο δυνατό είναι το πιόνι.
Το παιχνίδι αρχίζει με τον κόκκινο να κάνει την πρώτη κίνηση. Ο κάθε παίκτης πρέπει να μετακινήσει ένα από τα δικά του πιόνια ή να επιτεθεί σε ένα από τα πιόνια του αντιπάλου του. Η μετακίνηση και η επίθεση πρέπει να ακολουθούν τους παρακάτω κανόνες:

### Μετακίνηση
* Το κάθε πιόνι μπορεί να μετακινηθεί κατά μία θέση μόνο, με 4 διαφορετικούς πιθανούς προορισμούς (ευθεία, πίσω, αριστερά ή δεξιά). Μοναδική προϋπόθεση να μην υπάρχει εμπόδιο στον επιθυμητό προορισμό και αυτός να είναι εντός του ταμπλό. Ως εμπόδιο χαρακτηρίζεται ένα τετράγωνο που αντιστοιχεί σε λίμνη ή ένα τετράγωνο που υπάρχει τοποθετημένο πιόνι ίδιου χρώματος. 
* Εξαίρεση της μετακίνησης αποτελεί το πιόνι (9) ή αλλιώς Scout, το οποίο μπορεί να μετακινηθεί απεριόριστα κενά τετράγωνα σε ευθεία γραμμή, κάθετα ή οριζόντια.
* Δεν επιτρέπεται η διαγώνια μετακίνηση, η μετακίνηση πάνω από τις λίμνες ή η αναπήδηση πάνω από κάποιο άλλο πιόνι.
* Η σημαία (F) και οι βόμβες (B) δεν μπορούν να μετακινηθούν ποτέ αφότου τοποθετηθούν στο ταμπλό.

### Επίθεση
* Κατά την μετακίνηση, εάν ο προορισμός συμπίπτει με ένα τετράγωνο που είναι κατειλημμένο από ένα πιόνι αντιπάλου, τότε ξεκινάει η μάχη των 2 πιονιών. Αμέσως αποκαλείπτεται ο βαθμός κάθε πιονιού.
* Το πιόνι με τον χαμηλότερο βαθμό χάνει και αφαιρείται από το ταμπλό.
* Αν και τα 2 πιόνια έχουν ίδιο βαθμό, αφαιρούνται και τα 2 από το ταμπλό.
* Αν κερδίσει το επιτιθέμενο πιόνι, αντικαθιστά το πιόνι του ηττημένου πιονιού.
* Αν κερδίσει το αμυνόμενο πιόνι, παραμένει στη θέση του ενώ το επιτιθέμενο αφαιρείται από το ταμπλό.
* Οποιοδήποτε πιόνι κάνει επίθεση στο πιόνι (F) Flag, νικάει την μάχη.
* Οποιοδήποτε πιόνι κάνει επίθεση στο πιόνι (B) Bomb, χάνει την μάχη (εξαίρεση του κανόνα αυτού αποτελεί το πιόνι (8) Miner).
* Αν το επιτιθέμενο πιόνι είναι το (8) Miner και κάνει επίθεση στο (B) Bomb, τότε κερδίζει τη μάχη, καθώς ο μοναδικός σκοπός του (8) Miner είναι να απενεργοποιήσει την βόμβα.
*  Οποιοδήποτε πιόνι κάνει επίθεση στον (S) Spy, νικάει τη μάχη.
* Αν το επιτιθέμενο πιόνι είναι το (S) Spy και το αμυνόμενο ειναι το (1) Marshal, τότε το (S) Spy νικάει τη μάχη. Ο μοναδικός σκοπός του κατάσκοπου είναι να ανακαλύψει την θέση του στρατάρχη και να τον εξολοθρεύσει. 

### Στόχος Παιχνιδιού
Στόχος του παιχνιδιού είναι ο στρατός κάποιου παίκτη να κερδίσει την μάχη. Αυτό μπορεί να επιτευχθεί με δύο τρόπους. 
* Καταφέρνοντας να κατακτήσει την σημαία του αντιπάλου.
* Καταφέρνοντας να φτάσει τον αντίπαλο σε σημείο που τα πιόνια του δεν μπορούν να μετακινηθούν.

# Βάση Δεδομένων
Η βάση δεδομένων που δημιουργήθηκε για το project αποτελείται από 5 πίνακες (tables), 7 διεργασίες (procedures) και 1 έναυσμα (trigger). 
## Πίνακες
Ο πίνακας με όνομα "board" αποτελείται από 5 πεδία και αναπαριστά το ταμπλό του παιχνιδιού.
### board table
---------
| Attribute                | Description                                  | Values                              |
| ------------------------ | -------------------------------------------- | ----------------------------------- |
| `x`                      | H συντεταγμένη x του τετραγώνου              | 1..10                               |
| `y`                      | H συντεταγμένη y του τετραγώνου              | 1..10                               |
| `b_color`                | To χρώμα του τετραγώνου                      | 'GR','GY'                           |
| `piece_color`            | To χρώμα του πιονιού                         | 'B','R', null                       |
| `piece`                  | To πιόνι που υπάρχει στο τετράγωνο           | '1', '2', '3', '4', '5', '6', '7', '8', '9', 'B', 'F', 'S', null       |
| `moves`                  | Πίνακας με τα δυνατά τετράγωνα (x,y) που μπορεί να μετακινηθεί το τρέχον πιόνι. Αν δεν έχει γίνει αυθεντικοποίηση του παίκτη ή δεν έχει ξεκινήσει το παιχνίδι ή δεν είναι η σειρά του παίκτη να παίξει ή δεν υπάρχει πιόνι ή δεν υπάρχουν κινήσεις, τότε το πεδίο δεν υπάρχει. |   |

Ο πίνακας με όνομα "board_full" αποτελείται από 5 πεδία και δημιουργήθηκε για τους σκοπούς της παρουσίασης του project και έχει την ίδια δομή με τον πίνακα  "board". Τον χρησιμοποιούμε για να γεμίσουμε αυτόματα με προεπιλεγμένες τιμές το ταμπλό του παιχνιδιού, αποφεύγοντας την διαδικασία της τοποθέτησης των πιονιών.

Ο πίνακας με όνομα "board_start" αποτελείται από 5 πεδία, έχει την ίδια δομή με τον πίνακα  "board" και δημιουργήθηκε για να καλείται στο τέλος ενός παιχνιδιού. Με τον τερματισμό του τρέχοντος παιχνιδιού, προκειμένου να ξεκινήσει ένα καινούριο, αντί να γίνονται πολλαπλά updates στον πίνακα "board" (για να αφαιρούνται τα πιόνια από το ταμπλό), αντικαθιστούμε τον πίνακα της βάσης με τον πίνακα "board_start". Αυτός έχει αρχικοποιηθεί με όλες τις τιμές στα πεδία "piece_color" και "piece" να είναι null. Έτσι, όταν ξεκινάει ένα καινούριο παιχνίδι, το ταμπλό θα είναι άδειο.

Ο πίνακας με όνομα "players" αποτελείται από 3 πεδία και αποθηκεύει τα στοιχεία του κάθε παίκτη.
### players table
---------
| Attribute                | Description                                  | Values                              |
| ------------------------ | -------------------------------------------- | ----------------------------------- |
| `username`               | Όνομα παίκτη                                 | String                              |
| `piece_color`            | Το χρώμα των πιονιών του παίκτη              | 'B','R'                             |
| `token`                  | Το κρυφό token του παίκτη. Επιστρέφεται μόνο την στιγμή της εισόδου του παίκτη στο παιχνίδι  | HEX                             |

Ο πίνακας με όνομα "game_status" αποτελείται από 4 πεδία και αποθηκεύει την κατάσταση που βρίσκεται το παιχνίδι στην κάθε φάση, τον παίκτη που έχει σειρά να παίξει, το αποτέλεσμα του παιχνιδιού και την τελευταία αλλαγή που έγινε στον πίνακα.
### game_status table
---------
| Attribute                | Description                                  | Values                              |
| ------------------------ | -------------------------------------------- | ----------------------------------- |
| `status`                 | Κατάσταση παιχνιδιού                         | 'not active', 'initialized', 'piece_positioning', 'started', 'ended', 'aborded' |
| `p_turn`                 | Το χρώμα των πιονιών του παίκτη              | 'B','R', null                       |
| `result`                 | Το χρώμα του παίκτη που κέρδισε το παιχνίδι  | 'B','R', null                       |
| `last_change`            | Τελευταία αλλαγή / ενέργεια στην κατάσταση του παιχνιδιού | 'B','R', null          |

## Διεργασίες
* attack_on_same_piece

Η διεργασία με όνομα "attack_on_same_piece" καλείται κατά την επίθεση ενός πιονιού σε ένα πιόνι αντιπάλου με ίσο βαθμό. Επομένως, η διεργασία ενημερώνει το ταμπλό, αφαιρώντας από αυτό και τα δύο πιόνια.


* attack_on_stronger_piece
  
Η διεργασία με όνομα "attack_on_stronger_piece" καλείται κατά την επίθεση ενός πιονιού σε ένα πιόνι αντιπάλου με μικρότερο βαθμό. Επομένως, η διεργασία ενημερώνει το ταμπλό, διατηρώντας σε αυτό το αμυνόμενο πιόνι και αφαιρώντας το επιτιθέμενο.


* clean_board

Η διεργασία με όνομα "clean_board" καλείται για να αφαιρεθούν όλα τα πιόνια από το ταμπλό.


* fill_board

Η διεργασία με όνομα "fill_board" υπάρχει μόνο για σκοπούς της παρουσίασης της εργασίας. Όταν καλείται προστίθενται αυτοματοποιημένα, σε προεπιλεγμένες θέσεις όλα τα πιόνια των παικτών.


* move_piece

Η διεργασία με όνομα "move_piece" καλείται είτε κατά την μετακίνηση ενός πιονιού σε ένα άδειο τετράγωνο είτε κατά την επίθεση ενός πιονιού σε ένα πιόνι αντιπάλου με μεγαλύτερο βαθμό. Επομένως, η διεργασία ενημερώνει το ταμπλό. Στην πρώτη περίπτωση πραγματοποιείται η μετακίνηση και ενημερώνεται η θέση του πιονιού. Στην δεύετρη περίπτωση αντικαθίσταται το επιτιθέμενο πιόνι με το αμυνόμενο.


* place_piece

Η διεργασία με όνομα "place_piece" καλείται στην πρώτη φάση του παιχνιδιού, κατά την τοποθέτηση ενός πιονιού στο ταμπλό. Επομένως, η διεργασία ενημερώνει το ταμπλό τοποθετώντας το πιόνι στην θέση προορισμού.


* update_result

Η διεργασία με όνομα "update_result" καλείται με τον τερμαρισμό του παιχνιδιού. Επομένως, η διεργασία ενημερώνει τον πίνακα "game_status" αλλάζοντας την τιμή του "status" σε 'ended', την τιμή "p_turn" σε null και την τιμή του "result" στο χρώμα των πιονιών του νικητή ('R' για νικητή του κόκκινου στρατού και 'B' για νικητή του μπλε στρατού).

## Εναύσματα
* game_status_update

Το μοναδικό έναυσμα είναι το "game_status_update" και καλείται κατά την ενημέρωση του πίνακα "game_status". Επομένως, το έναυσμα ενημερώνει το πεδίο "last_change" θέτωντας ως τιμή το timestamp της στιγμής της ενημέρωσης.

# Απαιτήσεις που υλοποιήθηκαν
Κατά την δημιουργία της υλοποίησης της εφαρμογής υλοποιήθηκαν:
* Ανάπτυξη Web API (παίζουν human-human, χωρίς GUI, από CLI (εντολή curl)).
* Αρχικοποίηση σύνδεσης-authentication - 1 ή 2 άτομα.
* Έλεγχος κανόνων παιχνιδιού.
* Αναγνώριση σειράς παιξιάς.
* Αναγνώριση DeadLock (δεν υπάρχει κίνηση ή τέλος παιχνιδιού).
* Το APΙ χρησιμοποιεί json μορφή για τα δεδομένα.
* Η κατάσταση του παιχνιδιού αποθηκεύεται πλήρως σε MySQL.
* Ο πρώτος παίκτης αρχικοποιεί το board και περιμένει αντίπαλο όπου χρειάζεται.
* Μετά την είσοδο των παικτών, πραγματοποιείται τοποθέτηση πιονιών (μπορεί να ελεγχθεί από τον πίνακα "game_status" με την τιμή 'piece_potisioning').

Επιπλέον απαιτήσεις που υλοποιήθηκαν:
* Έλεγχος timeout → ακύρωση παίκτη.

# Περιγραφή API

## Methods
Επιπροσθέτως, δίνονται οι cURL εντολές.

### Board
#### Ανάγνωση board
```
GET /board/
```
```
curl https://users.iee.ihu.gr/~it185454/ADISE23_it185454/webfiles//stratego.php/board
```

Επιστρέφει το [board table](#board-table).

#### Άδειασμα board
```
POST /board/
```
```
curl -X POST https://users.iee.ihu.gr/~it185454/ADISE23_it185454/webfiles//stratego.php/board
```
Αδειάζει το board, δηλαδή το ταμπλό του παιχνιδιού δεν έχει πιόνια. 

Επιστρέφει το [board table](#board-table).

#### Αυτοματοποιημένο γέμισμα board
```
PUT /board/
```
```
curl -X PUT https://users.iee.ihu.gr/~it185454/ADISE23_it185454/webfiles//stratego.php/board
```
Γεμίζει το board, δηλαδή προστίθονται τα πιόνια σε προεπιλεγμένες θέσεις στο ταμπλό του παιχνιδιού. Αλλάζει η σειρά παιξιάς και η κατάσταση του παιχνιδιού από τοποθέτηση πιονιών ('piece_positioning') σε έναρξη παιχνιδιού ('started').

Επιστρέφει το [board table](#board-table) και το [game_status table](#game_status-table).

### Players
#### Ανάγνωση στοιχείων players
```
GET /players/
```
```
curl https://users.iee.ihu.gr/~it185454/ADISE23_it185454/webfiles//stratego.php/players
```

Επιστρέφει τα στοιχεία των [players table](#players-table) παραλείποντας το στοιχειο 'token' για λόγους ιδιωτικότητας.

#### Ανάγνωση στοιχείων player
```
GET /players/:p
```
Περίπτωση p = 'R'
```
curl https://users.iee.ihu.gr/~it185454/ADISE23_it185454/webfiles//stratego.php/players/R 
```
Περίπτωση p = 'B'
```
curl https://users.iee.ihu.gr/~it185454/ADISE23_it185454/webfiles//stratego.php/players/B
```

Επιστρέφει τα στοιχεία του [players table](#players-table) p παραλείποντας το στοιχειο 'token' για λόγους ιδιωτικότητας. Το p μπορεί να είναι 'R' ή 'B'.

#### Καθορισμός στοιχείων player
```
PUT /players/:p
```
Περίπτωση p = 'R'
```
curl -X PUT -d "{\"username\": \"{username}\"}" https://users.iee.ihu.gr/~it185454/ADISE23_it185454/webfiles//stratego.php/players/R 
```
Αυτό που ακολουθεί μετά το -d και πριν το url του request είναι το body του request. Την τιμή αυτή την ορίζει ο χρήστης ανάλογα με το username που θέλει να ορίσει.

Περίπτωση p = 'B'
```
curl -X PUT -d "{\"username\": \"{username}\"}" https://users.iee.ihu.gr/~it185454/ADISE23_it185454/webfiles//stratego.php/players/B
```
Αυτό που ακολουθεί μετά το -d και πριν το url του request είναι το body του request. Την τιμή αυτή την ορίζει ο χρήστης ανάλογα με το username που θέλει να ορίσει.

Json Data:

| Field             | Description                       | Required   | 
| ----------------- | --------------------------------- | ---------- |
| `color`           | To χρώμα που επέλεξε ο παίκτης p  | yes        |
| `username`        | Το username για τον παίκτη p      | yes        |

Επιστρέφει τα στοιχεία του [players table](#players-table) p και ένα token. Το token χρησιμοποιείται για ελέγχους καθόλη τη διάρκεια του παιχνιδιού.

### Piece
#### Εμφάνιση θέσης πιονιού
```
GET /board/piece/:x/:y/
```
```
curl https://users.iee.ihu.gr/~it185454/ADISE23_it185454/webfiles//stratego.php/board/piece/{x}/{y}
```

Επιστρέφει τη γραμμή του [board table](#board-table) όπου περιέχει το συγκεκριμένο πιόνι με τις συντεταγμένες x,y που δώθηκαν από τον χρήστη.

#### Τοποθέτηση πιονιού
```
POST /board/piece/:x/:y/
```
Περίπτωση p = 'R'
```
curl -X POST -d "{\"piece_color\": \"R\", \"piece\": \"{piece}\", \"token\": \"{token}\" }" https://users.iee.ihu.gr/~it185454/ADISE23_it185454/webfiles//stratego.php/board/piece/{x}/{y}
```
Αυτό που ακολουθεί μετά το -d και πριν το url του request είναι το body του request. Τις τιμές αυτές τις ορίζει ο χρήστης ανάλογα με το πιόνι, το προσωπικό του token και τις συντεταγμένες που θέλει να τοποθετήσει το πιόνι αντίστοιχα. 

Περίπτωση p = 'B'
```
curl -X POST -d "{\"piece_color\": \"B\", \"piece\": \"{piece}\", \"token\": \"{token}\" }" https://users.iee.ihu.gr/~it185454/ADISE23_it185454/webfiles//stratego.php/board/piece/{x}/{y}
```
Αυτό που ακολουθεί μετά το -d και πριν το url του request είναι το body του request. Τις τιμές αυτές τις ορίζει ο χρήστης ανάλογα με το πιόνι, το προσωπικό του token και τις συντεταγμένες που θέλει να τοποθετήσει το πιόνι αντίστοιχα. 

Json Data:

| Field             | Description                 | Required   |
| ----------------- | --------------------------- | ---------- |
| `x`               | Η αρχική θέση x             | yes        |
| `y`               | Η αρχική θέση y             | yes        |
| `piece_color`     | Το χρώμα του πιονιού        | yes        |
| `piece`           | Το πιόνι                    | yes        |
| `token`           | Το token του παίκτη         | yes        |

Επιστρέφει τα στοιχεία από το [board table](#board-table), καθώς έχουν ενημερωθεί λόγω της τοποθέτησης του πιονιού στο ταμπλό.

#### Μεταβολή θέσης πιονιού
```
PUT /board/piece/:x/:y/
```
```
curl -X PUT -d "{\"x\": \"{x2}\", \"y\": \"{y2}\", \"token\": \"{token}\" }" https://users.iee.ihu.gr/~it185454/ADISE23_it185454/webfiles//stratego.php/board/piece/{x}/{y}
```
Αυτό που ακολουθεί μετά το -d και πριν το url του request είναι το body του request. Τις τιμές αυτές τις ορίζει ο χρήστης ανάλογα με τις συντεταγμένες του προορισμού (x2,y2), το προσωπικό του token και τις συντεταγμένες αρχικής θέσης του πιονιού που θέλει να μετακινήσει (x,y) αντίστοιχα. 

Json Data:

| Field             | Description                 | Required   |
| ----------------- | --------------------------- | ---------- |
| `x`               | Η αρχική θέση x             | yes        |
| `y`               | Η αρχική θέση y             | yes        |
| `x2`              | Η θέση προορισμού x         | yes        |
| `y2`              | Η θέση προορισμού y         | yes        |
| `token`           | Το token του παίκτη         | yes        |

Κάνει την κίνηση του πιονιού από την θέση x,y στην νέα θέση x2,y2. Πριν πραγματοποιηθεί η κίνηση ελέγχονται:
1) αν έχει δωθεί token και αν αυτό αντιστοιχεί σε παίκτη του παιχνιδιού,
2) αν η κατάσταση του παιχνιδιού είναι 'started',
3) αν είναι η σειρά του να παίξει με βάση το token,
4) αν η κίνηση που προσπαθεί να κάνει είναι νόμιμη,
5) αν έχει επιλέξει πιόνι για μετακίνηση.

   
Επιστρέφει τα στοιχεία από το [board table](#board-table), καθώς έχουν ενημερωθεί λόγω της μετακίνησης του πιονιού στο ταμπλό.

### Status
#### Εμφάνιση κατάστασης παιχνιδιού
```
GET /status/
```
```
curl https://users.iee.ihu.gr/~it185454/ADISE23_it185454/webfiles//stratego.php/status
```

Επιστρέφει το [game_status table](#game_status-table).

### Exit
#### Τερματισμός παιχνιδιού
```
POST /exit/
```
```
curl -X POST https://users.iee.ihu.gr/~it185454/ADISE23_it185454/webfiles//stratego.php/exit
```
Αδειάζει τον πίνακα board, δηλαδή αφαιρεί τα πιόνια από το ταμπλό του παιχνιδιού. Ενημερώνει τον πίνακα game_status, δηλαδή αλλάζει την κατάσταση του παιχνιδιού από έναρξη ('started') σε τέλος παιχνιδιού ('ended'), αλλάζει την παιξιά σε null και ορίζει το αποτέλεσμα του παιχνιδιού ανάλογα με το χρώμα του στρατού που κέρδισε. Ενημερώνει τον πίνακα players, δηλαδή αλλάζει σε null το όνομα χρήστη και το token των δύο παικτών.

Επιστρέφει το [board table](#board-table), το [game_status table](#game_status-table) και το [players table](#players-table).
