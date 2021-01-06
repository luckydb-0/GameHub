/* PLATFORMS */

insert into platform (name) values ('PS5'),

('Xbox Series X'),

('PS4'),

('Xbox ONE'),

('Nintendo Switch'),

('PC');

/* CATEGORIES */

insert into category (categoryName) values ('Avventura'),

('Azione'),

('Corse'),

('GDR'),

('Indie'),

('Multigiocatore di massa'),

('Passatempo'),

('Simulazione'),

('Sparatutto'),

('Sport'),

('Strategia'),

('Platform');

/* DEVELOPERS */

insert into developer (name) values ('Electronic Arts'),

('Nintendo'),

('Ubisoft'),

('Sony'),

('Activision Blizzard'),

('Epic Games'),

('Square Enix'),

('Bungie'),

('Rockstar'),

('Altri');

/* VIDEOGAMES */

insert into videogame (title, soldCopies, releaseDate, developerId,platformId, image, suggestedPrice,description) values
('God of War', 100, '2018/04/20', 4, 3, 'GoW.jpg', 69.90,"Lasciatosi alle spalle la sua sete di vendetta verso gli dèi dell'Olimpo, Kratos ora vive nella terra delle divinità e dei mostri norreni. È in questo mondo ostile e spietato che dovrà combattere per la sopravvivenza e insegnare a suo figlio non solo a fare lo stesso, ma anche a evitare di ripetere gli stessi errori fatali del Fantasma di Sparta...

Questa sorprendente rielaborazione di God of War contiene tutti gli elementi caratteristici dell'iconica serie (combattimenti brutali, scontri epici con i boss e dimensioni mozzafiato) uniti a una narrazione intensa e commovente che getta una nuova luce sul mondo di Kratos.

Una nuova intensa narrazione:
Nella sua nuova veste di mentore e protettore di un figlio intenzionato a conquistare la stima del padre, Kratos ha davanti a sé l'inaspettata opportunità di imparare a gestire la rabbia che lo ha sempre caratterizzato. Interrogandosi sull'eredità oscura trasmessa al figlio, spera di poter rimediare alle mancanze e agli orrori del proprio passato.

Un mondo ancora più oscuro:
Immerso in foreste, montagne e regni incontaminati tipici del folklore nordico, dovrai districarti in una nuova e pericolosa terra corredata da un pantheon di creature, mostri e dèi.

Feroci combattimenti:
Con una intima visuale OTS (sopra la spalla), che porta l'azione più vicina che mai, il combattimento è in primo piano, frenetico e duro. La potente ascia magica di Kratos assume una doppia funzione di arma brutale e di versatile strumento per l'esplorazione. Non abbassare mai la guardia."),
('Far Cry 6', 0, '2021/12/31', 3, 1, 'FarCry6-PS5.jpg', 69.90,"Ti diamo il benvenuto a Yara, un paradiso tropicale congelato nel tempo. Antón Castillo, dittatore di Yara, vuole riportare la sua nazione alla gloria di un tempo. Per farlo è pronto a tutto, insieme al figlio Diego, che segue le sue orme insanguinate. La loro oppressione spietata ha acceso la miccia della rivoluzione."),
('Far Cry 6', 0, '2021/12/31', 3, 2, 'FarCry6-XBoxX.jpg', 69.90,"Ti diamo il benvenuto a Yara, un paradiso tropicale congelato nel tempo. Antón Castillo, dittatore di Yara, vuole riportare la sua nazione alla gloria di un tempo. Per farlo è pronto a tutto, insieme al figlio Diego, che segue le sue orme insanguinate. La loro oppressione spietata ha acceso la miccia della rivoluzione."),
('Far Cry 6', 0, '2021/12/31', 3, 6, 'FarCry6-PC.jpg', 69.90,"Ti diamo il benvenuto a Yara, un paradiso tropicale congelato nel tempo. Antón Castillo, dittatore di Yara, vuole riportare la sua nazione alla gloria di un tempo. Per farlo è pronto a tutto, insieme al figlio Diego, che segue le sue orme insanguinate. La loro oppressione spietata ha acceso la miccia della rivoluzione."),
('Animal Crossing', 200, '2020/03/20', 2, 5, 'AnimalCrossing-Switch.jpg', 69.90,"Animal Crossing: New Horizons arriva su Nintendo Switch il 20 marzo 2020!

Se il tran tran della vita moderna ti ha fatto scendere il morale sotto i tacchi, Tom Nook ha un'iniziativa imprenditoriale che fa proprio al caso tuo: il suo nuovissimo, iperesclusivo Pacchetto isola deserta di Nook Inc!

Certo, hai incontrato decine di simpatici personaggi. Ti sei divertito nei panni di un abitante. Forse ti sei persino messo al servizio del pubblico! Ma in fondo al cuore, non c'è una parte di te che ha voglia di... libertà? La possibilità di fare quello che vuoi, quando vuoi? Allora forse una lunga passeggiata sulle spiagge di un'isola deserta, nel mezzo della natura, è proprio quello che fa per te!

Goditi una vita pacifica e rilassata all'insegna della creatività e del fascino mentre ti rimbocchi le maniche per rendere la tua nuova vita proprio come la vuoi tu.

Raccogli risorse e usale per creare quello che vuoi, da comodità a utili strumenti. Asseconda la tua passione per il giardinaggio interagendo con fiori e alberi in modi nuovi. Crea una dimora perfetta dove le regole di cosa va dentro e cosa fuori non valgono più.

Fai amicizia con i nuovi arrivati, goditi le stagioni, esibisciti in salti con l'asta per superare i fiumi mentre esplori e molto altro!

Personalizza la tua casa e il tuo personaggio, e decora il paesaggio (con dei mobili, se desideri!) mentre crei un'isola paradisiaca!
Scopri un nuovo e dettagliato sistema di crafting: raccogli materiali per tutta l'isola per costruire quello che vuoi, da mobili ad attrezzi!
Goditi un'ampia varietà di attività rilassanti, come il giardinaggio, o la pesca, interagisci con i personaggi e molto altro. La classica formula di Animal Crossing trasportata su un'isola deserta!
La tua nuova casa non è ancora pronta. Perché non dai un'occhiata a questi altri giochi di Animal Crossing nell'attesa?"),
('XIII', 42, '2020/11/10', 2, 5, 'XIII-Switch.jpg', 69.90,"XIII è il Remake del videogioco d’azione culto in prima persona uscito nel 2003. Vestirai i panni di “XIII”, un uomo privo d’identità, e dovrai affrontare una campagna in solitaria ricca di colpi di scena. Il gioco, ispirato al fumetto eponimo, offre un’animazione cel-shaded unica nel suo genere e completamente rinnovata. XIII consentirà inoltre di partecipare a combattimenti multigiocatore brutali.

Il paese è ancora sotto shock dopo l’assassinio del Presidente Sheridan. Tu ti risvegli, ferito e in preda a un’amnesia, su una spiaggia deserta della costa orientale. I soli indizi che hai per risalire alla tua identità sono il numero XIII, tatuato vicino alla clavicola, e la chiave di un deposito bagagli. Nonostante la memoria ti abbia abbandonato, scopri di avere i riflessi di un combattente professionista perfettamente addestrato. Partendo alla ricerca del tuo passato, scoprirai di essere stato coinvolto nell’omicidio del Presidente degli Stati Uniti e svelerai la più incredibile cospirazione della storia del paese…

Remake del FPS culto del 2003 originariamente disponibile per PC, PlayStation 2, Xbox e Nintendo Gamecube.
Nuova direzione artistica che rispetta a pieno l’opera originaria e la sua iconica animazione cel-shaded.
Numerosi riferimenti al fumetto: onomatopee, fumetti, vignette, ecc.
Musiche e voci della versione originale.
Una storia di cospirazioni con infiniti colpi di scena.
Gameplay variegato con fasi di azione, infiltrazione e esplorazione.
Un’anelante campagna in solitaria di 34 livelli.
Un arsenale brutale con 15 armi diverse per ritrovare la memoria.
Combattimenti multigiocatore brutali."),
('Grand Theft Auto V', 500, '2013/09/17', 9, 3, 'GTA5-PS4.jpg', 69.90,"Los Santos: un'enorme e soleggiata metropoli piena di sedicenti guru, attricette e celebrità sul viale del tramonto. Un tempo era l'invidia del mondo occidentale, ma ora è costretta ad arrangiarsi per restare a galla in un'epoca di incertezza economica e TV via cavo da quattro soldi.
In mezzo a tutto questo, tre criminali molto diversi tra loro si danno da fare per sopravvivere e realizzarsi, ognuno a modo suo: l'ambizioso Franklin è a caccia di soldi e di opportunità; Michael, un ex criminale professionista, sta facendo i conti con una "pensione" meno rosea del previsto; e Trevor, un maniaco violento, pensa solo a farsi e al prossimo, grande colpo. I tre non hanno altra scelta: decidono di rischiare il tutto per tutto in una serie di colpi audaci e pericolosi che potrebbero sistemarli per la vita.
Con il più grande, il più dinamico e il più vario mondo di gioco mai creato, Grand Theft Auto V mescola sapientemente storia e gioco in modi del tutto nuovi, con i giocatori intenti a passare da una vita all'altra dei tre protagonisti e a vivere l'intreccio delle loro avventure.
Ritornano tutti gli elementi distintivi tipici della serie, compresa l'incredibile attenzione ai dettagli e il pungente umorismo di Grand Theft Auto, oltre che un nuovo e ambizioso approccio al mondo di gioco in multiplayer.

Los Santos & Blaine County:
Il mondo di Grand Theft Auto V (di gran lunga il più grande visto finora) è completamente accessibile fin dall'inizio e unisce zone molto distanti tra loro, sia dal punto di vista geografico che da quello culturale. I visitatori della metropoli di Los Santos e della rurale Blaine County incontreranno celebrità in declino, drogati, festaioli, bande violente, escursionisti, motociclisti e ogni tipo di curioso abitante. Sarete in grado di spostarvi ovunque, dalla cima delle montagne alle strade di Los Santos e persino nelle profondità dell'oceano."),
('Grand Theft Auto V', 310, '2013/09/17', 9, 4, 'GTA5-XBoxOne.jpg', 69.90,"Los Santos: un'enorme e soleggiata metropoli piena di sedicenti guru, attricette e celebrità sul viale del tramonto. Un tempo era l'invidia del mondo occidentale, ma ora è costretta ad arrangiarsi per restare a galla in un'epoca di incertezza economica e TV via cavo da quattro soldi.
In mezzo a tutto questo, tre criminali molto diversi tra loro si danno da fare per sopravvivere e realizzarsi, ognuno a modo suo: l'ambizioso Franklin è a caccia di soldi e di opportunità; Michael, un ex criminale professionista, sta facendo i conti con una "pensione" meno rosea del previsto; e Trevor, un maniaco violento, pensa solo a farsi e al prossimo, grande colpo. I tre non hanno altra scelta: decidono di rischiare il tutto per tutto in una serie di colpi audaci e pericolosi che potrebbero sistemarli per la vita.
Con il più grande, il più dinamico e il più vario mondo di gioco mai creato, Grand Theft Auto V mescola sapientemente storia e gioco in modi del tutto nuovi, con i giocatori intenti a passare da una vita all'altra dei tre protagonisti e a vivere l'intreccio delle loro avventure.
Ritornano tutti gli elementi distintivi tipici della serie, compresa l'incredibile attenzione ai dettagli e il pungente umorismo di Grand Theft Auto, oltre che un nuovo e ambizioso approccio al mondo di gioco in multiplayer.

Los Santos & Blaine County:
Il mondo di Grand Theft Auto V (di gran lunga il più grande visto finora) è completamente accessibile fin dall'inizio e unisce zone molto distanti tra loro, sia dal punto di vista geografico che da quello culturale. I visitatori della metropoli di Los Santos e della rurale Blaine County incontreranno celebrità in declino, drogati, festaioli, bande violente, escursionisti, motociclisti e ogni tipo di curioso abitante. Sarete in grado di spostarvi ovunque, dalla cima delle montagne alle strade di Los Santos e persino nelle profondità dell'oceano."),
('Grand Theft Auto V', 402, '2013/09/17', 9, 6, 'GTA5-PC.jpg', 69.90,"Los Santos: un'enorme e soleggiata metropoli piena di sedicenti guru, attricette e celebrità sul viale del tramonto. Un tempo era l'invidia del mondo occidentale, ma ora è costretta ad arrangiarsi per restare a galla in un'epoca di incertezza economica e TV via cavo da quattro soldi.
In mezzo a tutto questo, tre criminali molto diversi tra loro si danno da fare per sopravvivere e realizzarsi, ognuno a modo suo: l'ambizioso Franklin è a caccia di soldi e di opportunità; Michael, un ex criminale professionista, sta facendo i conti con una "pensione" meno rosea del previsto; e Trevor, un maniaco violento, pensa solo a farsi e al prossimo, grande colpo. I tre non hanno altra scelta: decidono di rischiare il tutto per tutto in una serie di colpi audaci e pericolosi che potrebbero sistemarli per la vita.
Con il più grande, il più dinamico e il più vario mondo di gioco mai creato, Grand Theft Auto V mescola sapientemente storia e gioco in modi del tutto nuovi, con i giocatori intenti a passare da una vita all'altra dei tre protagonisti e a vivere l'intreccio delle loro avventure.
Ritornano tutti gli elementi distintivi tipici della serie, compresa l'incredibile attenzione ai dettagli e il pungente umorismo di Grand Theft Auto, oltre che un nuovo e ambizioso approccio al mondo di gioco in multiplayer.

Los Santos & Blaine County:
Il mondo di Grand Theft Auto V (di gran lunga il più grande visto finora) è completamente accessibile fin dall'inizio e unisce zone molto distanti tra loro, sia dal punto di vista geografico che da quello culturale. I visitatori della metropoli di Los Santos e della rurale Blaine County incontreranno celebrità in declino, drogati, festaioli, bande violente, escursionisti, motociclisti e ogni tipo di curioso abitante. Sarete in grado di spostarvi ovunque, dalla cima delle montagne alle strade di Los Santos e persino nelle profondità dell'oceano."),
('FIFA 21', 310, '2019/09/25', 1, 1, 'FIFA21-PS5.jpg', 79.90,"Crea più opportunità di punteggio che mai con i nuovissimi sistemi di attacco dinamici nel gameplay FIFA più intelligente fino ad oggi.
Fifa 21 porta l'intelligenza dei giocatori e il processo decisionale a nuovi livelli sia dentro che fuori dalla palla."),
('FIFA 21', 190, '2019/09/25', 1, 2, 'FIFA21-XBoxX.jpg', 79.90,"Crea più opportunità di punteggio che mai con i nuovissimi sistemi di attacco dinamici nel gameplay FIFA più intelligente fino ad oggi.
Fifa 21 porta l'intelligenza dei giocatori e il processo decisionale a nuovi livelli sia dentro che fuori dalla palla."),
('FIFA 20', 433, '2019/09/25', 1, 3, 'FIFA20-PS4.jpg', 59.90,"EA SPORTS riporta il gioco nelle strade con la vera cultura, creatività e stile delle partite a ranghi ridotti. Crea il tuo personaggio e gioca secondo il tuo stile in diversi scenari in tutto il mondo.
Gameplay VOLTA: esprimi il tuo stile con un sistema di gioco completamente nuovo improntato al realismo. Ispirato al calcio a ranghi ridotti giocato nelle strade, nelle gabbie e nei campi di calcio a 5 di tutto il mondo;
Prova l'INTELLIGENZA CALCISTICA, che presenta un cambio di prospettiva tale da offrire un livello di realismo senza precedenti.
L'INTELLIGENZA CALCISTICA consente di vivere al massimo ogni attimo sul campo: con la palla, senza palla e attraverso la palla."),
('FIFA 20', 340, '2019/09/25', 1, 4, 'FIFA20-XBoxOne.jpg', 59.90,"EA SPORTS riporta il gioco nelle strade con la vera cultura, creatività e stile delle partite a ranghi ridotti. Crea il tuo personaggio e gioca secondo il tuo stile in diversi scenari in tutto il mondo.
Gameplay VOLTA: esprimi il tuo stile con un sistema di gioco completamente nuovo improntato al realismo. Ispirato al calcio a ranghi ridotti giocato nelle strade, nelle gabbie e nei campi di calcio a 5 di tutto il mondo;
Prova l'INTELLIGENZA CALCISTICA, che presenta un cambio di prospettiva tale da offrire un livello di realismo senza precedenti.
L'INTELLIGENZA CALCISTICA consente di vivere al massimo ogni attimo sul campo: con la palla, senza palla e attraverso la palla."),
('FIFA 20', 120, '2019/09/25', 1, 5, 'FIFA20-Switch.jpg', 49.90,"EA SPORTS riporta il gioco nelle strade con la vera cultura, creatività e stile delle partite a ranghi ridotti. Crea il tuo personaggio e gioca secondo il tuo stile in diversi scenari in tutto il mondo.
Gameplay VOLTA: esprimi il tuo stile con un sistema di gioco completamente nuovo improntato al realismo. Ispirato al calcio a ranghi ridotti giocato nelle strade, nelle gabbie e nei campi di calcio a 5 di tutto il mondo;
Prova l'INTELLIGENZA CALCISTICA, che presenta un cambio di prospettiva tale da offrire un livello di realismo senza precedenti.
L'INTELLIGENZA CALCISTICA consente di vivere al massimo ogni attimo sul campo: con la palla, senza palla e attraverso la palla."),
('FIFA 20', 192, '2019/09/25', 1, 6, 'FIFA20-PC.jpg', 49.90,"EA SPORTS riporta il gioco nelle strade con la vera cultura, creatività e stile delle partite a ranghi ridotti. Crea il tuo personaggio e gioca secondo il tuo stile in diversi scenari in tutto il mondo.
Gameplay VOLTA: esprimi il tuo stile con un sistema di gioco completamente nuovo improntato al realismo. Ispirato al calcio a ranghi ridotti giocato nelle strade, nelle gabbie e nei campi di calcio a 5 di tutto il mondo;
Prova l'INTELLIGENZA CALCISTICA, che presenta un cambio di prospettiva tale da offrire un livello di realismo senza precedenti.
L'INTELLIGENZA CALCISTICA consente di vivere al massimo ogni attimo sul campo: con la palla, senza palla e attraverso la palla."),
('Days Gone', 80, '2019/04/26', 4, 3, 'DG.jpg', 69.90,"Vesti i panni dell'ex motociclista fuorilegge Deacon St. John: vagabondo, cacciatore di taglie, avanzo di umanità errante. In un mondo devastato da una pandemia globale St. John rifiuta i "sicuri" accampamenti allestiti in aree selvagge dagli ultimi superstiti umani e sfida la sorte sulle strade accidentate.

Ambientato in un martoriato scenario vulcanico nel Pacifico nord-occidentale, Days Gone ti invita a esplorare un mondo sconvolto da mostri umani degenerati noti come Freaker. Esplora questo mondo devastato alla ricerca di provviste, risorse ma soprattutto di una ragione per cui continuare a vivere.

Un Open World, vivo come non mai, che ti terrà sempre sul chi vive
Ambienti e meteo dinamici che rendono il gameplay sempre vario ed immersivo
Una trama cruda e realistica capace di catturare ed emozionare il giocatore
Dinamiche di gioco uniche grazie all’interazione tra Deacon e la sua moto
Un’esperienza longeva grazie alle numerose sfide e missioni secondarie"),
('The Legend of Zelda - Breath of the Wild', 624, '2017/03/03', 2, 5, 'TLoZBofW-Switch.jpg', 50.99, "Entra in un mondo di avventure
Dimentica tutto quello che sai sui giochi di The Legend of Zelda e immergiti in un mondo di scoperte, esplorazione e avventura in The Legend of Zelda: Breath of the Wild, il nuovo capitolo di questa amatissima serie. Attraversa campi, foreste e montagne mentre cerchi di capire cosa è successo al regno di Hyrule in questa enorme, straordinaria avventura.

Esplora Hyrule in totale libertà
Scala torri e montagne in cerca di nuove destinazioni, poi scegli un percorso per raggiungerle e parti all'avventura. Lungo la strada affronterai nemici giganteschi, caccerai animali selvatici e raccoglierai il cibo e le pozioni che ti servono per sopravvivere.

Più di 100 sacrari da scoprire ed esplorare
Il mondo cela tanti sacrari, che potrai esplorare nell'ordine che preferisci. Al loro interno troverai enigmi di vario tipo. Supera le trappole e le sorprese che ti aspettano al varco per ottenere oggetti speciali e altre ricompense che ti aiuteranno nei tuoi viaggi.

Sii pronto a tutto
Con un intero mondo da esplorare, avrai certamente bisogno di varie tenute e dell'equipaggiamento adatto. Potresti dover indossare degli abiti caldi per proteggerti dal freddo o dei vestiti più leggeri quando sei nel deserto. Alcuni abiti hanno anche effetti speciali che possono renderti, per esempio, più veloce e furtivo.

Metti a punto le tue strategie
Incontrerai nemici di tutti i tipi e le dimensioni. Ognuno avrà attacchi e armi diverse, quindi devi pensare rapidamente e sviluppare le tattiche giuste per sconfiggerli."),
('Spiderman - Miles Morales', 310, '2020/11/12', 4, 1, 'SMMilesMorales-PS5.jpg', 79.90,"Nell'ultima avventura dell'universo di Marvel's Spider-Man, l'adolescente Miles Morales affronta il trasloco nella sua nuova casa mentre segue le orme del suo mentore, Peter Parker, per diventare il nuovo Spider-Man. Quando una feroce forza minaccia di distruggere la sua nuova casa, l'aspirante eroe comprende che da grandi poteri, derivano grandi responsabilità. Per salvare la New York della Marvel, Miles deve indossare il costume di Spider-Man e guadagnarselo."),
('Spiderman - Miles Morales', 401, '2020/11/12', 4, 3, 'SMMilesMorales-PS4.jpg', 69.90,"Nell'ultima avventura dell'universo di Marvel's Spider-Man, l'adolescente Miles Morales affronta il trasloco nella sua nuova casa mentre segue le orme del suo mentore, Peter Parker, per diventare il nuovo Spider-Man. Quando una feroce forza minaccia di distruggere la sua nuova casa, l'aspirante eroe comprende che da grandi poteri, derivano grandi responsabilità. Per salvare la New York della Marvel, Miles deve indossare il costume di Spider-Man e guadagnarselo."),
('Final Fantasy VII Remake', 511, '2020/03/02', 7, 3, 'FF7Remake-PS4.jpg', 64.90,"Il mondo è in mano alla compagnia elettrica Shinra, che sfrutta la linfa vitale del pianeta come energia. Nella vibrante città di Midgar, il gruppo Avalanche le oppone una strenua resistenza e chiede aiuto al mercenario Cloud Strife, un ex membro dei SOLDIER al servizio della Shinra. Cloud accetta, imbarcandosi così in un'avventura epica.

Il primo gioco di questo progetto, ovvero la spettacolare reinterpretazione contemporanea di uno dei giochi di ruolo più rivoluzionari della storia, sarà ambientato nella città eclettica di Midgar e sarà un’esperienza di gioco completa a sé stante."),
('Assassins Creed Valhalla', 220, '2020/11/10', 3, 1, 'ACValhalla-PS5.jpg', 69.90,"Vesti i panni di Eivor, combattente senza paura e leggenda tra tutti i vichinghi. Conduci il tuo clan dal desolante gelo della Norvegia fino al cuore delle praterie dell'Inghilterra del nono secolo. Fonda il tuo insediamento e parti alla conquista di una terra ostile con ogni mezzo necessario: tutto pur di ottenere la gloria del Valhalla.

Nell'epoca dei vichinghi l'Inghilterra è una nazione divisa, in cui ciascun regno è pronto a muovere guerra al vicino. Questo caos cela una terra ricca e sorperendente, che attende solo di essere conquistata. Sarai tu a farlo?"),
('Call of Duty - Advanced Warfare', 590, '2014/11/04', 5, 4, 'CoDAdvancedWarfare-XBoxOne.jpg', 24.99,"Call of Duty®: Advanced Warfare è finalmente pronto a calare i giocatori nei campi di battaglia del futuro, dove tecnologie e tattiche sono progredite a tal punto da cambiare per sempre il volto della guerra. L'attore premio oscar Kevin Spacey interpreta Jonathan Irons, uno degli uomini più potenti al mondo con una sconcertante visione del futuro.

Un mondo avanzato:

Call of Duty: Advanced Warfare è ambientato in un futuro del tutto verosimile in cui progresso tecnologico e tattiche militari attuali si sono intrecciati con effetti incredibili.
In questa dettagliata visione del futuro, frutto di attente e scrupolose ricerche, le corporazioni militari private sono diventate l'ossatura delle forze armate di innumerevoli nazioni che hanno esternalizzato l'apparato militare, ridisegnando i confini e riscrivendo le regole della guerra.
Jonathan Irons, fondatore e presidente dell'Atlas Corporation, leader mondiale degli appalti militari, si trova al centro di tutto.
Un soldato avanzato:

Potenti esoscheletri hanno incrementato l'efficienza in battaglia dei soldati, equipaggiandoli con armamenti più letali che mai e rendendoli estremamente versatili.
L'introduzione di questa nuova meccanica di gioco aumenta mobilità e verticalità delle mappe tramite salti potenziati, rampini, abilità di occultamento e dispositivi biomeccanici che forniscono parametri di forza, percezione, resistenza e velocità senza precedenti.
Con l'avvento degli esoscheletri e di equipaggiamento di nuova concezione, ogni soldato dispone della massima libertà tattica in qualsiasi scenario di guerra, rivoluzionando dalle fondamenta ogni singola modalità di Call of Duty."),
('Destiny', 112, '2019/04/26', 8, 4, 'Destiny-XBoxOne.jpg', 20.90,"Destiny è ambientato su diversi pianeti del sistema solare, tra cui Marte (dall'ecosistema simile a un deserto, con grandi dune di sabbia rossa e aride montagne rocciose), Venere (rigogliosa di foreste, di montagne e di vulcani sempre attivi e con un'atmosfera carica di acidi e azoto, colonizzata dalla razza umana durante l'età dell'oro, ma persa successivamente a un misterioso evento catastrofico noto come Crollo, e alla presa del controllo da parte dei Vex) e la Luna, colonizzata anche questa dagli umani e in seguito invasa da razze aliene nascoste sotto la Bocca dell'Inferno, un'enorme voragine, sconvolgendo così la geografia locale. Poi troviamo l'Atollo, un campo di asteroidi al confine tra Luce e Oscurità popolato dagli Insonni. Nel mese di maggio 2015 è stata rilasciata la seconda espansione del gioco, in cui è possibile visitare e giocare varie missioni in questa località."),
('Destiny', 409, '2019/04/26', 8, 3, 'Destiny-PS4.jpg', 20.90,"Destiny è ambientato su diversi pianeti del sistema solare, tra cui Marte (dall'ecosistema simile a un deserto, con grandi dune di sabbia rossa e aride montagne rocciose), Venere (rigogliosa di foreste, di montagne e di vulcani sempre attivi e con un'atmosfera carica di acidi e azoto, colonizzata dalla razza umana durante l'età dell'oro, ma persa successivamente a un misterioso evento catastrofico noto come Crollo, e alla presa del controllo da parte dei Vex) e la Luna, colonizzata anche questa dagli umani e in seguito invasa da razze aliene nascoste sotto la Bocca dell'Inferno, un'enorme voragine, sconvolgendo così la geografia locale. Poi troviamo l'Atollo, un campo di asteroidi al confine tra Luce e Oscurità popolato dagli Insonni. Nel mese di maggio 2015 è stata rilasciata la seconda espansione del gioco, in cui è possibile visitare e giocare varie missioni in questa località."),
('Titanfall 2', 80, '2016/10/28', 10, 4, 'Titanfall2-XBoxOne.jpg', 69.90,"Pilota e Titan si uniscono come mai prima d'ora nell'attesissimo Titanfall 2 di Respawn Entertainment. Con una nuova campagna per giocatore singolo che esplora il legame unico tra uomo e macchina, e accompagnato da un'esperienza multigiocatore più articolata rispetto a quella del suo predecessore, Titanfall 2 offre un'azione frenetica piena di sviluppi esaltanti.

Gameplay avanzato e pieno d'azione – Che tu combatta nei panni di un pilota, dei velocissimi guardiani d'élite della Frontiera, o a bordo di un Titan, macchine da guerra alte sei metri, Titanfall 2 garantisce sempre un'esperienza di combattimento divertente, fluida ed emozionante.
Avvincente campagna a giocatore singolo – Entra nel mondo della Frontiera come un fuciliere della milizia che aspira a diventare un pilota. Bloccato dietro le linee nemiche e contro un destino avverso, dovrai unire le forze con un Titan veterano di classe Vanguard e affrontare una missione che non avreste mai dovuto svolgere.
Azione multigiocatore più articolata – Caratterizzato da sei nuovissimi Titan, una serie di tecnologie letali inedite e nuove abilità per piloti, Titanfall 2 dà ai fan l’esperienza Multiplayer che avevano richiesto.
Gioca con gli amici o stringi nuove amicizie – Grazie all'introduzione dei Network, in Titanfall 2 sarà più facile e veloce giocare con amici vecchi e nuovi. Che sia sociale o competitivo, i giocatori potranno creare e unirsi a numerosi Network, scegliendo quelli che si adattano meglio allo stile e alle preferenze di gioco."),
('Uncharted 4', 273, '2016/05/10', 10, 3, 'Uncharted4-PS4.jpg', 69.90,"Fratelli in pericolo:
Tre anni dopo gli avvenimenti di Uncharted 3: L'inganno di Drake, Nathan Drake sembra essersi lasciato alle spalle la vita del cercatore di tesori. Tuttavia il destino non tarda a presentargli una nuova avventura a cui non può sottrarsi, quando il fratello, Sam, in pericolo di vita, ricompare alla ricerca di aiuto.

Sam e Drake, alla ricerca del tesoro del capitano Henry Avery, andato perduto da tempo, partono alla volta di Libertalia, utopia pirata nascosta nelle foreste del Madagascar. Uncharted 4: Fine di un ladro porta i giocatori in un viaggio attorno al globo, per isole ricoperte dalla giungla, città remote e cime innevate alla ricerca del tesoro di Avery.

Il riposo è sopravvalutato:
Nathan Drake,
Dopo il ritiro dall'attività di cercatore di tesori, Drake si trova improvvisamente di nuovo alle prese con il mondo dei ladri. Mosso da motivi ben più personali stavolta, affronta un viaggio intorno al mondo per far luce sullo storico complotto legato a un leggendario tesoro pirata. La sua più grande avventura metterà alla prova i suoi limiti fisici e la sua determinazione e soprattutto dimostrerà cosa è disposto a sacrificare per salvare i suoi cari.

Al fratellone serve aiuto:
Sam Drake,
Si credeva che Sam, di 5 anni più vecchio del fratello Nate, fosse morto. Si racconta che la sua scomparsa fosse il motivo originario che aveva spinto Nate a diventare un cercatore di tesori. Si dice che Sam fosse ancora più sprezzante del pericolo, rispetto a Nate, e che covasse un pizzico di invidia per i successi del fratello."),
('Super Mario Odyssey', 259, '2017/10/07', 2, 5, 'SuperMarioOdyssey-Switch.jpg', 49.90,"Unisciti a Mario in un'enorme avventura in 3D in giro per il mondo! Usa le sue nuove abilità per raccogliere lune con cui far funzionare l'Odyssey, il suo vascello volante, e aiutalo a salvare la principessa Peach dai piani di matrimonio di Bowser!

Questo gioco di Mario in 3D in stile sandbox, che continua la tradizione di Super Mario 64 del 1997 e Super Mario Sunshine del 2002, è ricco di segreti e sorprese e, con le nuove mosse di Mario come il lancio del cappello e la cap-tura, vivrai esperienze di gioco del tutto inedite. Preparati a scoprire luoghi strambi ed esotici molto lontani dal Regno dei Funghi!

Scopri enormi regni in 3D ricchi di segreti e sorprese, tra cui costumi per Mario e tanti modi di interagire con gli scenari: potrai esplorarli a bordo di veicoli o nei panni di Mario pixellato.
Grazie al suo nuovo amico Cappy, Mario potrà eseguire nuove mosse, come il lancio del cappello, il salto col cappello e la cap-tura. Con quest'ultima, Mario può prendere il controllo di oggetti e nemici!
Visita nuovi scenari mozzafiato, come i grattacieli di New Donk City, e imbattiti in amici e cattivi vecchi e nuovi mentre cerchi di fermare i piani di Bowser.
Al lancio del gioco sarà disponibile anche un set di tre nuovi amiibo (venduti separatamente): Mario, la principessa Peach e Bowser, tutti in abiti da matrimonio. Anche alcuni degli amiibo già esistenti saranno compatibili. Puoi usare gli amiibo compatibili per ricevere assistenza nel gioco e alcuni di essi sbloccheranno costumi per Mario!"),
('Demons Souls', 208, '2020/11/19', 4, 1, 'DemonsSouls-PS5.jpg', 20.90,"Da Sony arriva un remake del classico per PlayStation, Demon's Souls. Ricreato completamente a partire da zero e perfezionato sapientemente, questo remake presenta il mondo spaventoso di un'oscura e nebbiosa terra fantasy a una nuova generazione di gamer. Chi ha già affrontato in passato le sue peripezie, può sfidare ancora una volta l'oscurità con una grafica di qualità eccezionale e prestazioni incredibili.

Per conquistare il potere, il 12° Re di Boletaria, Re Allant, adoperò le antiche Arti delle anime, risvegliando un demone risalente all'alba dei tempi: l'Antico.
Con la rievocazione dell'Antico, una nebbia incolore calò sulla terra, scatenando creature da incubo che bramavano anime umane. Coloro ai quali veniva strappata l'anima impazzivano: rimaneva loro soltanto il desiderio di attaccare le persone sane rimaste.

Oggi Boletaria è isolata dal mondo esterno e i cavalieri che osano inoltrarsi nella nebbia profonda per liberare la terra dalla sua piaga scompaiono per sempre. Nei panni di un guerriero solitario che ha affrontato la terribile nebbia, devi intraprendere sfide difficilissime per ottenere il titolo di Uccisore di demoni e far tornare l'Antico al suo torpore."),
('Fuser', 208, '2020/11/10', 2, 5, 'Fuser-Switch.jpg', 59.90,"Dai creatori di Rock Band™ e Dance Central™, è in arrivo FUSER™, un festival musicale virtuale ininterrotto in cui sei tu a controllare la musica! Combina gli elementi dei brani più popolari del mondo per creare un sound tutto tuo o collabora con gli amici, poi condividi i tuoi mix incredibili e i tuoi epici show col resto del mondo!

Attingi da una raccolta di oltre 100 canzoni che include tracce dei più grandi artisti del mondo
Completa sfide per sbloccare nuove abilità e contenuti in modalità Campagna
Esplora, scopri e crea mix incredibili ed effetti personalizzati in modalità Freestyle
Collabora o competi con giocatori di tutto il mondo in modalità Multigiocatore
Opzioni di personalizzazione per adattare il look del gioco al tuo stile personale
Condividi i tuoi mix migliori e i tuoi show più indimenticabili all'interno del gioco e online"),
('Cyberpunk 2077', 580, '2020/12/10', 10, 1, 'Cyber-PS5.jpg', 79.90,"Cyberpunk 2077 è un'avventura a mondo aperto ambientata a Night City, una megalopoli ossessionata dal potere, dalla moda e dalle modifiche cibernetiche. Vestirai i panni di V, un mercenario fuorilegge alla ricerca di un impianto unico in grado di conferire l'immortalità. Potrai personalizzare il cyberware, le abilità e lo stile di gioco del tuo personaggio ed esplorare un'immensa città dove ogni scelta che farai plasmerà la storia e il mondo intorno a te."),
('Cyberpunk 2077', 580, '2020/12/10', 10, 2, 'Cyber-XBoxOne.jpg', 79.90,"Cyberpunk 2077 è un'avventura a mondo aperto ambientata a Night City, una megalopoli ossessionata dal potere, dalla moda e dalle modifiche cibernetiche. Vestirai i panni di V, un mercenario fuorilegge alla ricerca di un impianto unico in grado di conferire l'immortalità. Potrai personalizzare il cyberware, le abilità e lo stile di gioco del tuo personaggio ed esplorare un'immensa città dove ogni scelta che farai plasmerà la storia e il mondo intorno a te."),
('Hitman 3', 0, '2021/01/20', 10, 1, 'Hitman3.jpg', 79.90,"HITMAN 3 è la drammatica conclusione della trilogia del mondo degli assassini e porta i giocatori in giro per il mondo in un’avventura attraverso vaste locations sandbox. L'Agente 47 ritorna nei panni dello spietato assassino in HITMAN 3 per gli incarichi più importanti della sua intera carriera. La morte attende.

Goditi una libertà senza rivali e completa i tuoi obiettivi mentre il mondo del gioco reagisce a tutto ciò che fai. In HITMAN 3, la pluripremiata tecnologia Glacier di IOI dà vita a un mondo di gioco tattile e immersivo che offre al giocatore rigiocabilità e scelte impareggiabili."),
('Nier Replicant', 0, '2021/04/21', 7, 3, 'Nier-PS4.jpg', 69.90,"NieR Replicant ver.1.22474487139... è una versione aggiornata di NieR Replicant, precedentemente uscito solo in Giappone.

Scopri il prequel unico di NieR:Automata, il capolavoro acclamato dalla critica, rimodernizzato grazie a una grafica riportata in vita magistralmente, una storia affascinante e altro ancora!

Il protagonista è un giovane di buon cuore che vive in un villaggio remoto. Per salvare sua sorella Yonah, gravemente malata di Necrografia, parte con Grimoire Weiss, uno strano tomo parlante, alla ricerca dei Versi sigillati.

Per la prima volta in occidente, scopri la storia di NieR Replicant attraverso gli occhi del protagonista e di un fratello amorevole.");

/* CUSTOMERS */

insert into customer (name, surname, birthDate, email, password, phone) values
('Giorgio', 'Rossi', '1998/12/31', 'giorgio.rossi98@gmail.com', 'rossipower', '3551204567'),
('Gianluca', 'De Bonis', '1998/09/23', 'gianluca.debonis@gmail.com', 'debonispower', '3448900222'),
('Andrea', 'De Crescenzo', '2000/05/31', 'andrea.dec@gmail.com', 'decpower', '3451119834'),
('Lorenzo', 'Pagliazzi', '1998/03/18', 'lorenzo.paglia@gmail.com', 'pagliapower', '3449923610');


/* GAME COPY */

insert into game_copy (gameId, price) values
(1, 21.99),
(2, 80.99),
(3, 80.99),
(4, 59.99),
(5, 60.99),
(6, 80.99),
(7, 60.99),
(8, 60.99),
(9, 29.99),
(10, 29.99),
(11, 14.99),
(12, 70.99),
(13, 70.99),
(14, 60.99),
(15, 60.99),
(16, 40.99),
(17, 30.99),
(18, 40.99),
(18, 39.99),
(12, 70.99),
(8, 50.99),
(1, 21.99),
(6, 80.99),
(10, 25.99),
(11, 14.99),
(13, 70.99);

/* COPIES IN CART */

insert into copy_in_cart (userId, copyId) values (1, 1);

insert into copy_in_cart (userId, copyId) values (1, 2);

insert into copy_in_cart (userId, copyId) values (1, 3);

/* SELLERS */

insert into seller (name, email, password, p_iva, phone) values ('Viggì', 'Viggì@vg.it', 'wearevg', '01234567890', '0123456789');

insert into seller (name, email, password, p_iva, phone) values ('Grandi Venditori', 'gv@gv.it', 'wearegv', '12345678901', '1234567890');

/* CREDIT CARDS */

insert into credit_card (ccnumber,accountHolder, expiration, cvv, userId)
values
('01234567890123456789','Gianfranco Giuliacci', '2021/12/31', '123', 1),
('12345678901234567890','Gina Paoli', '2022/12/31', '456', 2),
('23456789012345678901','Franca Berlini', '2023/12/31', '789', 3),
('34567890123456789012', 'Betulla D Abete','2024/12/31', '012', 4);

/* ADDRESSES */

insert into address (country, city, street, postCode) values ('Italia', 'Cesena', 'via di Casa 1', '47521');

insert into address (country, city, street, postCode) values ('Italia', 'Cesena', 'via di Casa 2', '47521');

insert into address (country, city, street, postCode) values ('Italia', 'Cesena', 'via di Casa 3', '47521');

insert into address (country, city, street, postCode) values ('Italia', 'Cesena', 'via di Casa 4', '47521');

insert into address (country, city, street, postCode) values ('Italia', 'Cesena', 'via di Vendita 11', '47521');

insert into address (country, city, street, postCode) values ('Italia', 'Cesena', 'via di Vendita 12', '47521');

/* GAME CATEGORY */

/*
Category id:
	1 avventura
	2 azione 
	3 corse
	4 GDR
	5 Indie
	6 MMORPG
	7 Passatempo
	8 Simulazione
	9 Sparatutto
	10 Sport
	11 Strategia
	12 Platform
*/
insert into game_category (gameId, categoryId) values (1, 1),
(1, 2),
(2, 1),
(2, 2),
(2, 9),
(3, 1),
(3, 2),
(3, 9),
(4, 1),
(4, 2),
(4, 9),
(5, 7),
(5, 8),
(5, 4),
(6, 1),
(7, 2),
(7, 9),
(8, 9),
(8, 2),
(9, 9),
(9, 2),
(10, 10),
(11, 10),
(12, 10),
(13, 10),
(14, 10),
(15, 10),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 2),
(20, 4),
(21, 2),
(21, 4),
(22, 9),
(23, 1),
(23, 9),
(24, 1),
(24, 9),
(25, 9),
(26, 1),
(26, 2),
(26, 9),
(26, 12),
(27, 12),
(27, 1),
(28, 4),
(28, 1),
(28, 2),
(29, 7),
(30, 2),
(30, 4),
(31, 2),
(31, 4),
(32, 2),
(33, 4),
(33, 2);

/* SELLER ADDRESS */

insert into seller_address (sellerId, addressId) values (1, 5),
(2, 6);

/* COPY IN CATALOGUE */

insert into copy_in_catalogue (sellerId, copyId) values (1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25);
/* _ORDER */

insert into _order (userId, addressId, orderDate, total) values (1, 1, '2020/11/20', 82.98),
(1, 2, '2020/07/03', 60.99),
(2, 3, '2020/10/15', 60.99),
(3, 4, '2020/12/22', 30.99);

/* COPY_IN_ORDER */

insert into copy_in_order (copyId, orderId) values (1, 1),
(6, 1),
(14, 2),
(9, 3),
(17, 4);

/* ORDER_SELLER */

insert into order_seller (sellerId, orderId) values (1, 1),
(1, 2),
(2, 3),
(2, 4);

/* SHIPPING */

insert into shipping (addressId, userId) values (1, 1),
(2, 2),
(3, 3),
(4, 4);
