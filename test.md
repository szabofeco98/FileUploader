# Szótár Projekt

## 1. A rendszer célja

## 2. Projektterv

#### Projekt:Szótár alkalmazás.

1. **Erőforrások:**
   1. Idő:
       * 2019.09.09 : Csapat megalakulása.
       * 2019.09.16 : Projekt kezdete.
       * 2019.09.30 : Projekt átadása.
       * Rendelkezésre álló idő : 14 nap.
   2. Munkaerő:
       * 4 junior fejlesztő ezért a szerepek között lehetnek átfedések. 
       * 1 fő Front End fejlesztő.
       * 1 fő Full Stack fejlesztő .
       * 2 fő Back End fejlesztő.
2. **Mérdöldkövek:**
    1. Csapat megalakulás projekt kiválasztása:
      2019.09.09-kor megalakult a csapat majd 2019.09.16-kor kiválasztásra került a projekt.
    2. 2019.09.23-ig :
        <details>
            <summary>Követelmény specifikáció:</summary>
              <pre>
              1. Jelenlegi helyzet.
              2. Vágyálom rendszer
              3. Jelenlegi üzleti folyamatok
              4. Igényelt Üzleti folyamatok
            </pre>
         </details>
         <details>
            <summary>Funkcionális specifikáció:</summary>
              <pre>
              1. Jelenlegi helyzet.
              2. Vágyálom rendszer
              3. Jelenlegi üzleti folyamatok
              4. Igényelt Üzleti folyamatok
            </pre>
         </details>
       <details>
            <summary>Rendszerterv</summary>
              <pre>
              1. A rendszer célja
              2. Projektterv
              3. Üzleti folyamatok modellje
              4. Követelmények
              5. Funkcionálisterv
              6. Fizikai környezet
              7. Architekturálisterv
              8. Implementációsterv
              9. Tesztterv
              10. Telepitésiterv
              11. Karbantartásiterv
            </pre>
         </details>
    3. 2019.09.30-ig Szótár alkalmazás lefejlesztése.
4. **Szerepkörök**
   * Frond End fejlesztő: Hamza Sándor.:Ő felelős az alkalmazás kinézetéért továbbá hogy az alkalmazás könnyen 
         használható legyen minden funkció magáért beszélően legyen megjelenítve.Munkája a fxml/css szerkesztését is tartalmazza
   * Back End fejlesztők : Szabó Alexandra,Petrik Dávid.:Felelős az adatok megfelelő áramlásáért,adatbázis kapcsolat kialakításáért
     és az üzleti logika implementálásáért.
   * Full Stack fejlesztő:Szabó Ferenc .:Front End és Back End munkálatok végzése egyaránt.
       
   

Author:[Szabó Ferenc](https://github.com/szabofeco98)

## 3. Üzleti folyamatok modellje
   * **Megvalósítandó Üzleti folyamatok:**
     * A szofver regisztrációs és bejelentkező felületet kell hogy nyújtson a felhasználók számára 
      .Regisztráláskor meg kell adnia nevét email címét és egy általa választott jelszót ezeket az adatokat egy adatbázisban tároljuk
       amelyekkel majd bejelentkezhet a felületre.
     * A szótár felület lehetőséget kell biztosítson szavak hozzá adására kézzel vagy txt fájlból való beolvasással és szavak törlésére        is lehetőséget kell adjon .Funkciót kell biztosítson minden szó felkérdezésére vagy véletlenszerűen  x-darab szó felkérdezésére 
       a szoftver  azonnal vissza jelez hogy eltaláltuk-e a szót vagy sem.
   * **Üzleti Szereplők**
     * Felhasználó:A regsztrációs felület kitöltése után felhasználói jogusultságot kap a szoftver használó
      .A felhasználónak lehetősége van  a szavak adatbázisban való tárolására.Adatbázisban tárolt szavak bővítésére/törlésére tárolt            szavak megtekintésére valamint használhatók a felkérdezés funkciók.
     * Vendég Felhasználó:Amennyiben nincs regisztrált felhasználónk is használható az alkalmazás azonban nem elérhetőek az adatbázishoz
       kapcsolódó műveletek(szavak hoszú tűvú tárolása,törlés,hozzáadás).
   * **Üzleti Entitások**
     * Word: Kézzel bevihető vagy fájl beolvasással regisztrált fiók estén adatbázisban tárolja.
            Az objektum váza:
     
       | Word |
       |------|
       |String(hunWord)|
       |String(engWord|
       |Number(userId)|
             
     * User: Regisztrálás során vihető fel az adatbázisba segítségével a felhasználók adatbázisban tudják tárolni szavaikat.
             Bejelentkezni csak regisztrált userel lehetséges.Az objektum váza:
             
       |User|
       |------|
       |Number(ID)|
       |String(userName)|
       |String(passWord)|
       |String(email)|
   
    
Author:[Szabó Ferenc](https://github.com/szabofeco98)
## 4. Követelmények

## 5. Funkcionálisterv

## 6. Fizikai környezet

## 7. Architekturálisterv

## 8. Implementációsterv

## 9. Tesztterv

## 10. Telepitésiterv

## 11. Karbantartásiterv
