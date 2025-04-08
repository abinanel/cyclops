# cyclops
# cara menjalankan aplikasi cyclops
1. download dan install xampp
2. bukan xampp, start Apache dan start mySQL
3. buka database editor (misal dbeaver), buat koneksi ke mySQL localhost sendiri, lalu buat database dengan nama "daikin"
4. restore file dump-daikin-202504090010.sql dari git, ke database tersebut
5. pindahkan folder daikin-cyclops ke direktory windows C:\xampp\htdocs
6. buka browser dan akses url http://localhost/daikin-cyclops/auth/login
7. aplikasi web cyclops sudah bisa di pakai