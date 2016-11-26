//=======Tworzenie bazy danych===============//

1. Wchodzimy na stronę: localhost:8080/
2. Widzimy panel logowania do phpMyAdmin - Login: root | hasło: root123
3. Na pasku u góry klikamy Konta użytkowników
4. Następnie poniżej klikamy "Add user account"
5. Uzupełniamy następujące pola (tylko wspomniane poniżej):

Nazwa użytkownika: admin <br />
Hasło: admin123 <br />
Powtórz: admin123 <br />

Zaznaczamy "Utwórz bazę danych z taką samą nazwą i przyznaj wszystkie uprawnienia"

Wszystko niewymienione zostawiamy domyślnie lub puste. 

6. Klikamy "Wykonaj" i wylogowujemy się z root'a (mała ikonka drzwi pod napisem phpMyAdmin).
7. Od tej pory mamy utworzone osobne konto i baze danych w phpMyAdmin (i to te dane będziemy podawać w pliku .env)

Dane: <br />
login - admin <br />
hasło - admin123 <br />

Te kroki są jednorazowe. Wystarczy zrobić to raz i więcej powtarzać nie będzie potrzeby.

//=========Instalacja projektu==================//

1. git clone (adres-repo) będąc w głównym katalogu (tym w którym znajdują sie takie katalogi jak ClionProjects czy PhpstormProjects)
2. Poniższe instrukcje można wkleić bezpośrednio do konsoli:

rm -rf PhpmystormProjects/ <br />
mv php_2016_zarzadzanie_czasem/ PhpstormProjects/ <br />
cd PhpstormProjects/trunk/ <br />
composer install <br />
chmod -R 0777 storage/ <br />
cp .env.example .env <br />
php artisan key:generate <br />

3. Następnie:
vim .env (lub edycja w PhpstormProjects) i zmieniamy:

DB_DATABASE=admin	<br />
DB_USERNAME=admin <br />
DB_PASSWORD=admin123 <br />

4. Będąc w katalogu trunk:
php artisan migrate<br />

5. Jednokrotnie należy też wyedytować (albo najlepiej przekopiować plik konfiguracyjny) w nginx:

cd /etc/nginx/sites-available/ <br />
sudo su <br />
student123 <br />
cp laravel project (lub vim laravel) <br />
vim project <br />

Jeśli plik konfiguracyjny został skopiowany należy zmienić port z 8000 na jakiś inny np. 8009. Jeśli jest wyedytowany to może zostać 8000.
Trzeba też zmienić ścieżkę root do katalogu trunk/public/ w projekcie i zapisać zmiany. Jeśli plik konfiguracyjny był kopiowany należy też pamiętać
o utworzeniu dowiązania symbolicznego: ln -s project ../sites-enabled/project

6. Po przejściu na stronę localhost:8000 lub localhost:8009 (w zależności od konfiguracji) powinna wyświetlić się strona startowa
