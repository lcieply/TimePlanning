//=======Tworzenie bazy danych===============//

1. Wchodzimy na stronę: localhost:8080/
2. Widzimy panel logowania do phpMyAdmin - Login: root | hasło: root123
3. Na pasku u góry klikamy Konta użytkowników
4. Następnie poniżej klikamy "Add user account"
5. Uzupełniamy następujące pola (tylko wspomniane poniżej):

Nazwa użytkownika: admin

Hasło: admin123

Powtórz: admin123

Zaznaczamy "Utwórz bazę danych z taką samą nazwą i przyznaj wszystkie uprawnienia"

Wszystko niewymienione zostawiamy domyślnie lub puste. 

6. Klikamy "Wykonaj" i wylogowujemy się z root'a (mała ikonka drzwi pod napisem phpMyAdmin).
7. Od tej pory mamy utworzone osobne konto i baze danych w phpMyAdmin (i to te dane będziemy podawać w pliku .env)

Dane: 

login - admin

hasło - admin123

Te kroki są jednorazowe. Wystarczy zrobić to raz i więcej powtarzać nie będzie potrzeby.

//=========Instalacja projektu==================//

1. git clone (adres-repo) będąc w głównym katalogu (tym w którym znajdują sie takie katalogi jak ClionProjects czy PhpstormProjects)
2. Poniższe instrukcje można wkleić bezpośrednio do konsoli:

rm -rf PhpmystormProjects/

mv php_2016_zarzadzanie_czasem/ PhpstormProjects/

cd PhpstormProjects/trunk/

composer install

chmod -R 0777 storage/

cp .env.example .env

php artisan key:generate

3. Następnie:

vim .env (lub edycja w PhpstormProjects) i zmieniamy:

DB_DATABASE=admin

DB_USERNAME=admin

DB_PASSWORD=admin123

4. Będąc w katalogu trunk:

php artisan migrate

5. Jednokrotnie należy też wyedytować (albo najlepiej przekopiować plik konfiguracyjny) w nginx:

cd /etc/nginx/sites-available/

sudo su

student123

cp laravel project (lub vim laravel)

vim project

Jeśli plik konfiguracyjny został skopiowany należy zmienić port z 8000 na jakiś inny np. 8009. Jeśli jest wyedytowany to może zostać 8000.
Trzeba też zmienić ścieżkę root do katalogu trunk/public/ w projekcie i zapisać zmiany. Jeśli plik konfiguracyjny był kopiowany należy też pamiętać
o utworzeniu dowiązania symbolicznego: ln -s project ../sites-enabled/project

6. Po przejściu na stronę localhost:8000 lub localhost:8009 (w zależności od konfiguracji) powinna wyświetlić się strona startowa
