const {
  Document, Packer, Paragraph, TextRun, Table, TableRow, TableCell,
  HeadingLevel, AlignmentType, LevelFormat, BorderStyle, WidthType,
  ShadingType, PageNumber, PageBreak, TabStopType, TabStopPosition
} = require('docx');
const fs = require('fs');

const bold = (text, size = 24) => new TextRun({ text, bold: true, size, font: "Times New Roman" });
const normal = (text, size = 24) => new TextRun({ text, size, font: "Times New Roman" });
const italic = (text, size = 24) => new TextRun({ text, italics: true, size, font: "Times New Roman" });

function heading1(text) {
  return new Paragraph({
    heading: HeadingLevel.HEADING_1,
    alignment: AlignmentType.CENTER,
    spacing: { before: 400, after: 200 },
    children: [new TextRun({ text, bold: true, size: 28, font: "Times New Roman", allCaps: true })]
  });
}

function heading2(text) {
  return new Paragraph({
    heading: HeadingLevel.HEADING_2,
    spacing: { before: 300, after: 150 },
    children: [new TextRun({ text, bold: true, size: 26, font: "Times New Roman" })]
  });
}

function heading3(text) {
  return new Paragraph({
    heading: HeadingLevel.HEADING_3,
    spacing: { before: 240, after: 120 },
    children: [new TextRun({ text, bold: true, size: 24, font: "Times New Roman" })]
  });
}

function para(runs, indent = true) {
  return new Paragraph({
    spacing: { before: 100, after: 100, line: 360 },
    indent: indent ? { firstLine: 720 } : {},
    children: Array.isArray(runs) ? runs : [normal(runs)]
  });
}

function bulletPara(text) {
  return new Paragraph({
    spacing: { before: 80, after: 80, line: 360 },
    indent: { left: 720, hanging: 360 },
    numbering: { reference: "bullets", level: 0 },
    children: [normal(text)]
  });
}

function numbered(text) {
  return new Paragraph({
    spacing: { before: 80, after: 80, line: 360 },
    indent: { left: 720, hanging: 360 },
    numbering: { reference: "numbers", level: 0 },
    children: [normal(text)]
  });
}

function pageBreak() {
  return new Paragraph({ children: [new PageBreak()] });
}

function emptyLine() {
  return new Paragraph({ children: [normal("")], spacing: { before: 0, after: 0 } });
}

// ---- TITLE PAGE ----
const titlePage = [
  new Paragraph({ spacing: { before: 1440, after: 200 }, alignment: AlignmentType.CENTER, children: [bold("PENGARUH LIBRARY ANXIETY TERHADAP PEMENUHAN KEBUTUHAN INFORMASI PEMUSTAKA MAHASISWA BARU DI PERPUSTAKAAN X", 28)] }),
  emptyLine(),
  new Paragraph({ alignment: AlignmentType.CENTER, spacing: { before: 100, after: 100 }, children: [normal("Tema: Perilaku Pengguna Perpustakaan dan Faktor Psikologis dalam Pencarian Informasi", 24)] }),
  pageBreak(),
];

// ---- DAFTAR ISI ----
const daftarIsi = [
  new Paragraph({ alignment: AlignmentType.CENTER, spacing: { before: 0, after: 400 }, children: [bold("DAFTAR ISI", 28)] }),
  new Paragraph({ children: [normal("BAB I PENDAHULUAN", 22)], spacing: { before: 80, after: 40 } }),
  new Paragraph({ children: [normal("    1.1. Latar Belakang", 22)], spacing: { before: 40, after: 40 } }),
  new Paragraph({ children: [normal("    1.2. Rumusan Masalah", 22)], spacing: { before: 40, after: 40 } }),
  new Paragraph({ children: [normal("    1.3. Tujuan Penelitian", 22)], spacing: { before: 40, after: 40 } }),
  new Paragraph({ children: [normal("    1.4. Batasan Masalah", 22)], spacing: { before: 40, after: 40 } }),
  new Paragraph({ children: [normal("    1.5. Manfaat Penelitian", 22)], spacing: { before: 40, after: 40 } }),
  new Paragraph({ children: [normal("BAB II LANDASAN TEORI", 22)], spacing: { before: 80, after: 40 } }),
  new Paragraph({ children: [normal("    2.1. Perpustakaan Perguruan Tinggi", 22)], spacing: { before: 40, after: 40 } }),
  new Paragraph({ children: [normal("    2.2. Pemustaka Perpustakaan", 22)], spacing: { before: 40, after: 40 } }),
  new Paragraph({ children: [normal("    2.3. Kebutuhan Informasi", 22)], spacing: { before: 40, after: 40 } }),
  new Paragraph({ children: [normal("    2.4. Pengertian Kecemasan Secara Umum", 22)], spacing: { before: 40, after: 40 } }),
  new Paragraph({ children: [normal("    2.5. Library Anxiety", 22)], spacing: { before: 40, after: 40 } }),
  new Paragraph({ children: [bold("    2.6. Psikologi Perpustakaan", 22)], spacing: { before: 40, after: 40 } }),
  new Paragraph({ children: [normal("    2.7. Penelitian Sejenis Sebelumnya", 22)], spacing: { before: 40, after: 40 } }),
  new Paragraph({ children: [bold("    2.8. Kerangka Konseptual", 22)], spacing: { before: 40, after: 40 } }),
  new Paragraph({ children: [normal("BAB III METODOLOGI PENELITIAN", 22)], spacing: { before: 80, after: 40 } }),
  new Paragraph({ children: [normal("    3.1. Jenis Penelitian", 22)], spacing: { before: 40, after: 40 } }),
  new Paragraph({ children: [normal("    3.2. Data dan Sumber Data", 22)], spacing: { before: 40, after: 40 } }),
  new Paragraph({ children: [normal("    3.3. Teknik Pengumpulan Data", 22)], spacing: { before: 40, after: 40 } }),
  new Paragraph({ children: [normal("    3.4. Teknik Analisis Data", 22)], spacing: { before: 40, after: 40 } }),
  new Paragraph({ children: [normal("    3.5. Teknik Penyajian Data", 22)], spacing: { before: 40, after: 40 } }),
  new Paragraph({ children: [normal("DAFTAR PUSTAKA", 22)], spacing: { before: 80, after: 40 } }),
  pageBreak(),
];

// ---- BAB I ----
const bab1 = [
  heading1("BAB I"),
  heading1("PENDAHULUAN"),
  heading2("1.1. Latar Belakang"),
  para("Perpustakaan perguruan tinggi merupakan pilar utama dalam ekosistem akademik yang berfungsi sebagai pusat sumber belajar, penelitian, dan pelestarian ilmu pengetahuan. Di tengah zaman yang semakin modern akan informasi, peran perpustakaan menjadi semakin krusial sebagai penyedia akses terhadap informasi yang baik dan berkualitas bagi mahasiswa. Namun, realitas di lapangan menunjukkan adanya pertentangan; meskipun perpustakaan menyediakan sumber daya yang melimpah, tidak semua mahasiswa mampu memanfaatkannya dengan optimal. Terdapat hambatan psikologis signifikan yang seringkali tidak kasat mata namun berdampak besar, yaitu fenomena yang dikenal sebagai library anxiety atau kecemasan perpustakaan."),
  para([normal("Fenomena "), italic("library anxiety"), normal(" pertama kali didefinisikan secara mendalam oleh (Mellon 1986). Melalui penelitian kualitatifnya, Mellon menemukan bahwa mayoritas mahasiswa memandang perpustakaan bukan sebagai tempat yang mendukung, melainkan sebagai lingkungan yang mengancam dan membingungkan.")]),
  para("Terdapat tiga konsep kunci yang melandasi kecemasan ini: (1) mahasiswa merasa keterampilan riset mereka jauh di bawah rekan-rekan mereka, (2) mereka merasa malu untuk mengakui ketidakmampuan tersebut, dan (3) mereka menganggap bahwa bertanya kepada pustakawan hanya akan memperjelas kebodohan mereka (Mellon 1986). Perasaan ini menciptakan tembok penghalang yang membuat mahasiswa lebih memilih menghindari perpustakaan daripada harus menghadapi rasa malu tersebut."),
  para([normal("Seiring berjalannya waktu, pemicu kecemasan ini berkembang melampaui sekadar rasa malu personal. Penelitian terbaru menunjukkan bahwa kompleksitas institusional berperan besar. (Mcpherson 2015) mengidentifikasi bahwa ukuran bangunan perpustakaan yang besar, tata letak gedung yang rumit, serta organisasi koleksi yang membingungkan seringkali membuat mahasiswa mengalami disorientasi ruang atau kesulitan memahami tata letak fisik koleksi, lokasi koleksi, dan alur layanan di dalam gedung perpustakaan. Ketidakmampuan navigasi fisik ini, jika dikombinasikan dengan kurangnya pengalaman menggunakan perpustakaan di masa sekolah menengah, akan menciptakan tekanan mental yang menghambat proses pencarian informasi (Mcpherson 2015).")]),
  para([normal("Selain faktor fisik dan psikologis, revolusi teknologi informasi juga menghadirkan dimensi baru dalam "), italic("library anxiety"), normal(". Saat ini, perpustakaan tidak hanya berupa tumpukan buku fisik, melainkan juga gerbang menuju pangkalan data daring (online databases) dan sistem temu kembali informasi yang kompleks. Mahasiswa yang memiliki kemahiran komputer rendah cenderung merasa terintimidasi oleh prosedur pencarian digital, yang pada akhirnya meningkatkan level kecemasan mereka secara keseluruhan saat mencoba memenuhi kebutuhan referensi akademik mereka.")]),
  para("Lebih jauh lagi, aspek lingkungan binaan (built environment) juga tidak dapat diabaikan. Desain interior perpustakaan, mulai dari sistem pencahayaan, dekorasi, hingga ketersediaan ruang belajar yang memadai, sangat mempengaruhi kenyamanan psikologis mahasiswa (Nieves-whitmore 2021). Desain yang kurang memperhatikan aspek kemanusiaan dapat memperburuk perasaan terasing, sementara desain yang inklusif dapat membantu menurunkan level kecemasan."),
  para([normal("Dampak dari "), italic("library anxiety"), normal(" ini sangat serius terhadap keberhasilan akademik. Mahasiswa yang terjebak dalam kecemasan cenderung memiliki kepuasan yang rendah dan keterlibatan yang minim terhadap sumber daya perpustakaan (Pang, Quinto, and Orillo 2025). Ketika kebutuhan informasi mahasiswa tidak terpenuhi baik karena mereka takut bertanya, bingung mencari, atau frustrasi dengan teknologi maka kualitas karya ilmiah dan capaian pembelajaran mereka akan menurun.")]),
  para([normal("Di Perpustakaan X, gejala-gejala kecemasan ini mulai tampak melalui misalnya: rendahnya statistik kunjungan pada area koleksi tertentu atau banyaknya mahasiswa yang hanya menggunakan area lobi untuk mengerjakan tugas tanpa menyentuh koleksi referensi. Tanpa adanya penanganan yang tepat, "), italic("library anxiety"), normal(" akan menjadi penghambat utama dalam mewujudkan visi perpustakaan sebagai jantung akademik. Oleh karena itu, penelitian mendalam mengenai \"Pengaruh Library Anxiety terhadap Pemenuhan Kebutuhan Informasi Mahasiswa Baru di Perpustakaan X\" menjadi sangat mendesak untuk dilakukan sebagai dasar perbaikan layanan dan strategi literasi informasi ke depan.")]),
  heading2("1.2. Rumusan Masalah"),
  para("Berdasarkan latar belakang tersebut, permasalahan dalam penelitian ini dirumuskan sebagai berikut:"),
  bulletPara("Apa saja dimensi library anxiety yang dialami oleh pemustaka mahasiswa baru ketika memanfaatkan layanan, fasilitas, dan sumber informasi yang tersedia di Perpustakaan X dalam proses pencarian informasi?"),
  bulletPara("Bagaimana library anxiety mempengaruhi kemampuan pemustaka mahasiswa baru dalam menemukan, mengakses, dan memanfaatkan sumber informasi di Perpustakaan X untuk memenuhi kebutuhan informasi mereka?"),
  heading2("1.3. Tujuan Penelitian"),
  para("Penelitian ini bertujuan untuk:"),
  bulletPara("Mengetahui dimensi-dimensi library anxiety yang dialami oleh pemustaka mahasiswa baru ketika memanfaatkan layanan, fasilitas, dan sumber informasi yang tersedia di Perpustakaan X dalam proses pencarian informasi."),
  bulletPara("Menganalisis pengaruh library anxiety terhadap kemampuan pemustaka mahasiswa baru dalam menemukan, mengakses, dan memanfaatkan sumber informasi di Perpustakaan X dalam rangka pemenuhan kebutuhan informasi mereka."),
  heading2("1.4. Batasan Masalah"),
  para("Agar penelitian ini lebih terfokus, maka peneliti membatasi ruang lingkup sebagai berikut:"),
  bulletPara("Subjek penelitian dalam penelitian ini adalah mahasiswa baru (semester awal) yang menjadi pemustaka di Perpustakaan X."),
  bulletPara("Variabel yang diteliti meliputi library anxiety sebagai variabel independen (X) dan pemenuhan kebutuhan informasi sebagai variabel dependen (Y)."),
  bulletPara("Library anxiety dalam penelitian ini dibatasi pada beberapa dimensi yang berkaitan dengan kecemasan dalam menggunakan perpustakaan, seperti rasa tidak percaya diri dalam mencari informasi, kesulitan memahami tata letak perpustakaan, kecemasan dalam menggunakan teknologi informasi, serta keengganan untuk bertanya kepada pustakawan."),
  bulletPara("Pemenuhan kebutuhan informasi yang dimaksud dalam penelitian ini terbatas pada kemampuan mahasiswa baru dalam menemukan, mengakses, dan memanfaatkan sumber informasi yang tersedia di Perpustakaan X."),
  bulletPara("Penelitian ini hanya dilakukan di Perpustakaan X dan tidak membahas kondisi perpustakaan lain."),
  heading2("1.5. Manfaat Penelitian"),
  heading3("1.5.1. Manfaat Teoretis"),
  para("Penelitian ini diharapkan dapat memberikan kontribusi dalam pengembangan ilmu perpustakaan dan informasi, khususnya yang berkaitan dengan konsep library anxiety dan pemenuhan kebutuhan informasi pemustaka. Selain itu, penelitian ini juga diharapkan dapat menjadi referensi atau bahan kajian bagi penelitian selanjutnya yang membahas perilaku pemustaka dalam memanfaatkan layanan dan sumber informasi di perpustakaan perguruan tinggi."),
  heading3("1.5.2. Manfaat Praktis"),
  bulletPara("Bagi Pustakawan/Pengelola Perpustakaan X: Hasil penelitian ini diharapkan dapat menjadi bahan evaluasi bagi pengelola Perpustakaan X dalam memahami tingkat kecemasan yang dialami oleh mahasiswa baru serta faktor-faktor yang mempengaruhi pemanfaatan layanan perpustakaan. Dengan demikian, perpustakaan dapat merancang strategi layanan, program literasi informasi, dan penyediaan fasilitas yang lebih ramah bagi pemustaka."),
  bulletPara("Bagi Mahasiswa: Penelitian ini diharapkan dapat memberikan pemahaman kepada mahasiswa, khususnya mahasiswa baru, mengenai pentingnya memanfaatkan layanan dan sumber informasi di perpustakaan serta membantu mereka mengurangi rasa kecemasan dalam menggunakan fasilitas perpustakaan."),
  pageBreak(),
];

// ---- BAB II ----
const bab2 = [
  heading1("BAB II"),
  heading1("LANDASAN TEORI"),
  heading2("2.1. Perpustakaan Perguruan Tinggi"),
  heading3("2.1.1. Pengertian Perpustakaan"),
  para("Perpustakaan merupakan salah satu lembaga yang memiliki peran strategis dalam dunia pendidikan. Secara umum, perpustakaan dapat diartikan sebagai suatu unit kerja yang bertugas mengumpulkan, menyimpan, dan menyajikan berbagai sumber informasi kepada penggunanya. Menurut Undang-Undang Republik Indonesia Nomor 43 Tahun 2007 tentang Perpustakaan, perpustakaan adalah institusi pengelola koleksi karya tulis, karya cetak, dan/atau karya rekam secara profesional dengan sistem yang baku guna memenuhi kebutuhan pendidikan, penelitian, pelestarian, informasi, dan rekreasi para pemustaka."),
  para("Perpustakaan dalam konteks akademik tidak sekadar berfungsi sebagai tempat penyimpanan buku, melainkan telah bertransformasi menjadi pusat sumber belajar yang menyediakan berbagai layanan berbasis teknologi untuk mendukung kebutuhan akademik pemustaka (Jaya 2025). Kehadiran teknologi informasi telah membawa perubahan fungsi perpustakaan sehingga memberikan peluang yang besar bagi pemustaka dalam mengakses informasi secara lebih efisien dan efektif (Syukrinur 2022)."),
  heading3("2.1.2. Pengertian Perpustakaan Perguruan Tinggi"),
  para("Perpustakaan perguruan tinggi adalah perpustakaan yang terdapat pada perguruan tinggi, badan bawahannya, maupun lembaga yang bekerja sama dengan perguruan tinggi, dengan tujuan utamanya membantu perguruan tinggi dalam mencapai tujuannya."),
  para("Menurut Sulistyo (2003) Perpustakaan Perguruan Tinggi adalah perpustakaan yang terdapat pada perguruan tinggi, badan bawahannya maupun lembaga yang berafiliasi dengan perguruan tinggi, dengan tujuan utama membantu perguruan tinggi mencapai tujuannya. Sedangkan menurut Sutarno (2003: 35) Perpustakaan Perguruan Tinggi merupakan perpustakaan yang berada dalam suatu perguruan tinggi dan yang sederajat yang berfungsi mencapai Tri Dharma Perguruan Tinggi, sedangkan penggunanya adalah seluruh civitas akademika. Secara umum dapat disimpulkan bahwa pengertian perpustakaan adalah suatu institusi unit kerja yang menyimpan koleksi bahan pustaka secara sistematis dan mengelolanya dengan cara khusus sebagai sumber informasi dan dapat digunakan oleh pemakainya."),
  heading3("2.1.3. Fungsi dan Peran Perpustakaan Perguruan Tinggi"),
  para("Fungsi perpustakaan perguruan tinggi berkaitan erat dengan tri dharma perguruan tinggi, yaitu pendidikan, penelitian, dan pengabdian kepada masyarakat. Sebagaimana yang tercantum dalam Undang-Undang Perpustakaan pada pasal 3, yaitu perpustakaan berfungsi sebagai wahana pendidikan, penelitian, pelestarian, informasi, dan rekreasi untuk meningkatkan kecerdasan dan keberdayaan bangsa."),
  para("(Syukrinur 2022) dalam tulisannya mengelaborasi fungsi-fungsi perpustakaan sebagai berikut: fungsi pendidikan, di mana perpustakaan merupakan tempat belajar bagi para pemustaka; fungsi penelitian, di mana perpustakaan menjadi penyedia berbagai referensi untuk keperluan penelitian; fungsi informasi, yaitu perpustakaan menyediakan informasi yang dibutuhkan oleh pemustaka; fungsi penyimpanan; dan fungsi rekreasi. Peran perpustakaan perguruan tinggi juga semakin berkembang seiring dengan transformasi digital yang mendorong perpustakaan untuk berinovasi dalam layanannya demi memenuhi kebutuhan pemustaka yang terus berkembang."),
  heading2("2.2. Pemustaka Perpustakaan"),
  heading3("2.2.1. Pengertian Pemustaka"),
  para("Pemustaka merupakan pengguna perpustakaan, baik perseorangan maupun kelompok, yang memanfaatkan layanan perpustakaan. Berdasarkan Undang-Undang Nomor 43 Tahun 2007 tentang Perpustakaan, pemustaka adalah pengguna perpustakaan, yaitu perseorangan, kelompok orang, masyarakat, atau lembaga yang memanfaatkan fasilitas layanan perpustakaan. Di lingkungan perguruan tinggi, pemustaka terdiri atas mahasiswa, dosen, tenaga kependidikan, serta pihak lain yang memiliki kepentingan akademik."),
  para("Pemustaka di perpustakaan perguruan tinggi memiliki karakteristik dan kebutuhan yang berbeda-beda tergantung pada latar belakang akademik dan tujuan kunjungannya. Dalam konteks penelitian ini, pemustaka yang menjadi fokus adalah mahasiswa sebagai pengguna utama perpustakaan perguruan tinggi."),
  heading3("2.2.2. Karakteristik Pemustaka Mahasiswa"),
  para("Menurut Sarwono (2008, dalam Permatasari, et al 2021) mengemukakan bahwa mahasiswa adalah setiap orang yang secara resmi terdaftar untuk mengikuti pelajaran di perguruan tinggi dengan batas usia sekitar 18-30 tahun. Mahasiswa adalah kelompok dalam masyarakat yang memiliki status khusus karena keterikatannya dengan institusi perguruan tinggi. Mereka juga dipandang sebagai calon intelektual atau cendekiawan muda yang berada dalam lapisan masyarakat tertentu dan kerap disematkan berbagai predikat."),
  para("Karakteristik pemustaka mahasiswa terbagi berdasarkan tahun studi, program studi, dan tingkat literasi informasi yang dimiliki. Era digital mendorong peningkatan kebutuhan informasi yang dihadapi mahasiswa, khususnya dalam konteks akademik. Penelitian menunjukkan bahwa mahasiswa membutuhkan informasi sebagai penunjang perkuliahan melalui platform perpustakaan digital (Alwannia, et al 2025). Selain itu, preferensi mahasiswa terhadap sumber informasi pun beragam; sebagian lebih menyukai buku digital untuk kemudahan akses, sementara yang lain tetap memilih buku cetak untuk pengalaman membaca yang mendalam."),
  heading3("2.2.3. Mahasiswa Baru sebagai Pemustaka Perpustakaan"),
  para("Mahasiswa baru merupakan kelompok pemustaka yang paling rentan menghadapi ketidaknyamanan saat pertama kali menggunakan perpustakaan perguruan tinggi. Hal ini disebabkan oleh minimnya pengalaman mereka dalam memanfaatkan berbagai layanan dan fasilitas perpustakaan yang lebih kompleks dibandingkan perpustakaan sekolah. Pendidikan pemakai (user education) di perpustakaan perguruan tinggi menjadi gerbang bagi sivitas akademika, terutama mahasiswa baru, dalam memanfaatkan fasilitas dan informasi yang ada di perpustakaan secara optimal."),
  para("Mahasiswa baru sering kali belum mengetahui tentang keberadaan perpustakaan, letak koleksi, serta bagaimana menggunakan fasilitas yang ada seperti menelusur dengan mesin pencarian online, memanfaatkan koleksi e-jurnal maupun e-book sebagai sumber informasi. Kondisi inilah yang kemudian memicu munculnya perasaan cemas atau yang dikenal dengan istilah library anxiety ketika mereka harus menggunakan perpustakaan untuk pertama kalinya. Penelitian (Abdurokhim and Laugu 2024) menemukan bahwa library anxiety juga dapat dialami oleh mahasiswa baru penyandang disabilitas tunanetra di perpustakaan perguruan tinggi."),
  heading2("2.3. Kebutuhan Informasi"),
  heading3("2.3.1. Pengertian Kebutuhan Informasi"),
  para("Kebutuhan informasi merupakan dorongan yang muncul dalam diri seseorang untuk mencari dan memperoleh informasi yang diperlukan guna memenuhi tujuan tertentu. Menurut Perdana (2021 dalam Alwannia, et al 2025), manusia mengandalkan informasi untuk memenuhi berbagai kebutuhan seperti menambah pengetahuan, meningkatkan keterampilan, mengurangi ketidakpastian, dan memperoleh kepuasan. Kebutuhan informasi bersifat dinamis dan terus berkembang seiring dengan perubahan situasi dan tuntutan lingkungan akademik."),
  para("Dalam konteks perpustakaan, kebutuhan informasi menjadi landasan utama bagi seluruh aktivitas layanan yang disediakan. (Rahayu and Rohmadi 2023) dalam penelitiannya menemukan bahwa kecemasan perpustakaan berpengaruh signifikan terhadap pemenuhan kebutuhan informasi pemustaka, dengan koefisien determinasi sebesar 64,2%. Artinya, semakin tinggi tingkat kecemasan yang dialami pemustaka, semakin rendah kemampuannya dalam memenuhi kebutuhan informasi yang dibutuhkan."),
  heading3("2.3.2. Jenis-Jenis Kebutuhan Informasi"),
  para("Berbagai ahli telah mengelompokkan kebutuhan informasi ke dalam beberapa kategori. Salah satu teori yang banyak digunakan adalah teori Uses and Gratifications yang membagi kebutuhan informasi ke dalam lima aspek: (1) kebutuhan kognitif, yaitu kebutuhan yang berkaitan dengan perolehan pengetahuan dan pemahaman; (2) kebutuhan afektif, yaitu kebutuhan yang berkaitan dengan pengalaman emosional dan estetika; (3) kebutuhan integrasi personal, yaitu kebutuhan yang berkaitan dengan penguatan kepercayaan diri dan kredibilitas; (4) kebutuhan integrasi sosial, yaitu kebutuhan yang berkaitan dengan interaksi sosial; dan (5) kebutuhan pelepasan ketegangan, yaitu kebutuhan yang berhubungan dengan hiburan dan pelarian."),
  para("Aspek kognitif mendorong mahasiswa mencari sumber informasi yang akurat dan mudah diakses, sehingga buku digital dan jurnal elektronik menjadi pilihan utama. Aspek afektif lebih terpenuhi melalui buku cetak yang memberikan pengalaman emosional dan imajinatif saat membaca. Selain itu, aspek integrasi personal dan sosial mendorong mahasiswa menggunakan berbagai sumber informasi untuk meningkatkan kredibilitas akademik dan menjalin interaksi sosial dalam lingkungan belajar (Alwannia, et al 2025)."),
  heading3("2.3.3. Faktor yang Mempengaruhi Kebutuhan Informasi"),
  para("Kebutuhan informasi seseorang dipengaruhi oleh berbagai faktor, baik yang bersifat internal maupun eksternal. Faktor internal meliputi tingkat pendidikan, latar belakang pengetahuan, minat dan motivasi, serta kemampuan literasi informasi. Sementara faktor eksternal meliputi lingkungan sosial, perkembangan teknologi, ketersediaan sumber informasi, dan aksesibilitas layanan perpustakaan."),
  para("Kecemasan perpustakaan (library anxiety) merupakan salah satu faktor yang terbukti mempengaruhi kemampuan mahasiswa dalam memenuhi kebutuhan informasinya. Library anxiety yang dialami mahasiswa dapat berujung pada rendahnya pemanfaatan layanan perpustakaan, sehingga kebutuhan informasi mereka tidak terpenuhi secara optimal (Rahayu and Rohmadi 2023). Selain itu, ketersediaan koleksi perpustakaan yang sesuai dengan kebutuhan pemustaka juga menjadi faktor penting dalam pemenuhan kebutuhan informasi akademik mahasiswa (Reva Andini et al. 2024)."),
  heading3("2.3.4. Proses Pencarian Informasi"),
  para("Proses pencarian informasi merupakan serangkaian aktivitas yang dilakukan seseorang untuk menemukan informasi yang dibutuhkan. Perilaku pencarian informasi mahasiswa di perguruan tinggi menunjukkan strategi yang sistematis dan berlapis. Mahasiswa menggunakan perpustakaan digital untuk memenuhi kebutuhan akademik yang mendesak dan efisien, sementara buku cetak digunakan untuk bacaan yang memerlukan pemahaman mendalam dan kenyamanan membaca (Alwannia, et al 2025)."),
  para("Hambatan dalam proses pencarian informasi dapat berupa keterbatasan pengetahuan tentang penggunaan perpustakaan, kurangnya kompetensi literasi informasi, maupun adanya kecemasan saat berada di perpustakaan. Penelitian Wijayanto dan Christiani (2024 dalam Ramadhan et al. 2025) menunjukkan bahwa perilaku pencarian informasi mahasiswa dipengaruhi oleh konteks dan tujuan penggunaan, bukan semata-mata kemudahan teknologi."),
  heading2("2.4. Pengertian Kecemasan Secara Umum"),
  heading3("2.4.1. Pengertian Kecemasan"),
  para("Kecemasan (anxiety) merupakan kondisi psikologis yang ditandai oleh perasaan tidak nyaman, ketakutan, dan kekhawatiran yang berlebihan terhadap suatu situasi atau objek tertentu. Kecemasan dapat bersifat situasional, yaitu muncul akibat kondisi atau lingkungan tertentu, maupun bersifat trait, yaitu merupakan bagian dari kepribadian seseorang. Kecemasan situasional lebih relevan dalam konteks penggunaan perpustakaan, karena terkait langsung dengan pengalaman seseorang saat berada di perpustakaan."),
  para("Kecemasan sering muncul ketika seseorang berada di tempat yang dirasa asing atau baru ia temui. Kondisi ini sangat relevan dengan pengalaman mahasiswa baru yang untuk pertama kalinya mengunjungi perpustakaan perguruan tinggi yang jauh lebih besar dan kompleks dibandingkan perpustakaan yang pernah mereka gunakan sebelumnya. Kecemasan dalam konteks akademik dapat menghambat kemampuan belajar dan menurunkan performa akademik jika tidak ditangani dengan baik."),
  heading3("2.4.2. Pengertian Library Anxiety"),
  para([normal("Library anxiety"), normal(" atau kecemasan perpustakaan merupakan konsep yang pertama kali diperkenalkan oleh Constance A. Mellon pada tahun 1986. Mellon mendefinisikan library anxiety sebagai perasaan yang dialami oleh pemustaka saat berada di perpustakaan, yang meliputi perasaan takut, cemas, bingung, tidak berdaya, dan tidak percaya diri dalam menggunakan perpustakaan. Dalam penelitian Mellon menggunakan metode jurnal pribadi, mayoritas informan memiliki pengalaman tidak baik saat menggunakan perpustakaan, dan banyak hambatan yang dirasakan dalam melakukan penelusuran informasi yang membuat mereka merasa tersesat (Ravena and Dewi 2021).")]),
  para("(Khasanah and Zatadini 2023) mendefinisikan library anxiety sebagai perasaan bingung, takut, dan rasa frustasi yang dialami oleh pemustaka ketika minimnya pengalaman dalam proses pencarian informasi di perpustakaan. Kondisi ini sangat umum terjadi dan dapat menghambat performa akademik mahasiswa."),
  heading3("2.4.3. Faktor-Faktor Terjadinya Kecemasan di Perpustakaan"),
  para("(Mellon 1986) mengidentifikasi empat faktor utama yang menyebabkan kecemasan di perpustakaan, yaitu: (a) the size of the library, yaitu ukuran atau besarnya perpustakaan yang membuat pemustaka merasa kebingungan; (b) a lack of knowledge about where things were located, yaitu kurangnya pengetahuan tentang letak berbagai hal di dalam perpustakaan; (c) how to begin, yaitu ketidaktahuan tentang bagaimana memulai suatu kegiatan di perpustakaan; dan (d) what to do, yaitu kebingungan tentang apa yang harus dilakukan di dalam perpustakaan."),
  para("Dalam perkembangannya, tingkat library anxiety pemustaka ini dapat diukur menggunakan beberapa metode yang telah dikembangkan oleh para ahli. Seperti yang dilakukan oleh Bostick (1992) dalam The Development and Validation of The Library Anxiety Scale yang mendasari terciptanya pengukuran kuantitatif dari kecemasan pemustaka dengan metode LAS atau Library Anxiety Scale."),
  heading3("2.4.4. Dimensi atau Indikator Library Anxiety"),
  para("Berbagai instrumen telah dikembangkan untuk mengukur library anxiety, salah satunya adalah Multidimensional Library Anxiety Scale (MLAS) yang dikembangkan oleh Van Kampen. MLAS mengkaji enam faktor library anxiety yang dapat digunakan sebagai dimensi pengukuran dalam penelitian (Ravena and Dewi 2021). Selain MLAS, terdapat pula AQAK: Library Anxiety Scale for Undergraduates Student yang mengidentifikasi lima faktor, yaitu: (1) user knowledge (pengetahuan pengguna), (2) library staff (staf perpustakaan), (3) library environment (lingkungan perpustakaan), (4) information resources (sumber informasi), dan (5) user education (pendidikan pemakai)."),
  heading3("2.4.5. Dampak Library Anxiety terhadap Penggunaan Perpustakaan"),
  para("Library anxiety memberikan dampak yang cukup signifikan terhadap pemanfaatan perpustakaan oleh mahasiswa. Kecemasan yang tidak ditangani dengan baik dapat membuat mahasiswa menjadi enggan untuk berkunjung ke perpustakaan, tidak memanfaatkan layanan yang tersedia secara optimal, bahkan cenderung menghindari penggunaan perpustakaan secara keseluruhan. Kondisi ini pada akhirnya dapat berkontribusi terhadap rendahnya tingkat kunjungan fisik ke perpustakaan."),
  para("Penelitian (Rahayu and Rohmadi 2023) di Perpustakaan UIN Sunan Kalijaga Yogyakarta menunjukkan bahwa terdapat pengaruh positif yang signifikan antara kecemasan perpustakaan dan pemenuhan kebutuhan informasi pemustaka, di mana semakin tinggi tingkat kecemasan maka semakin rendah kemampuan pemustaka dalam memenuhi kebutuhannya."),
  heading2("2.5. Library Anxiety"),
  heading3("2.5.1. Konsep Library Anxiety"),
  para("Konsep library anxiety pertama kali dikemukakan oleh Constance A. Mellon pada tahun 1986 melalui sebuah penelitian grounded theory. Mellon menemukan bahwa sebagian besar mahasiswa yang diteliti mengalami perasaan tidak nyaman, takut, dan cemas saat harus menggunakan perpustakaan untuk pertama kalinya. Konsep ini kemudian berkembang dan menjadi salah satu topik yang banyak diteliti dalam bidang ilmu perpustakaan dan informasi (Ravena and Dewi 2021)."),
  para("Perkembangan konsep library anxiety menunjukkan bahwa kecemasan ini bukan hanya terbatas pada mahasiswa baru, tetapi juga dapat dialami oleh mahasiswa tingkat akhir yang harus menggunakan layanan referensi dan database akademik yang lebih kompleks."),
  heading3("2.5.2. Scala Library Anxiety"),
  para("Scala atau skala pengukuran library anxiety dikembangkan oleh berbagai ahli guna mengoperasionalisasikan konsep kecemasan perpustakaan ke dalam instrumen yang dapat diukur secara empiris. Bostick (1993) mengembangkan Library Anxiety Scale (LAS) yang kemudian menjadi salah satu instrumen pengukuran library anxiety yang paling banyak digunakan. LAS mengukur lima dimensi utama kecemasan perpustakaan yang mencakup berbagai aspek interaksi pemustaka dengan perpustakaan."),
  para("Selain LAS, terdapat pula MLAS (Multidimensional Library Anxiety Scale) yang dikembangkan oleh Van Kampen dengan enam faktor pengukuran, serta AQAK: Library Anxiety Scale for Undergraduates Student yang memiliki lima faktor."),
  heading3("2.5.3. Teori Mellon"),
  para("Teori library anxiety yang dikemukakan oleh Constance A. Mellon pada tahun 1986 merupakan landasan utama dalam penelitian-penelitian tentang kecemasan di perpustakaan. Mellon menggunakan pendekatan grounded theory dalam penelitiannya terhadap mahasiswa baru yang menggunakan perpustakaan untuk pertama kalinya. Hasilnya menunjukkan bahwa sebagian besar mahasiswa mengalami perasaan cemas yang bersumber dari empat hal utama, yaitu ukuran perpustakaan, ketidaktahuan tentang letak koleksi, cara memulai kegiatan di perpustakaan, dan ketidaktahuan tentang apa yang harus dilakukan."),
  heading3("2.5.4. Teori Anxiety Uncertainty Management (AUM)"),
  para("Teori Anxiety Uncertainty Management (AUM) dikembangkan oleh William B. Gudykunst sebagai salah satu teori komunikasi lintas budaya yang menjelaskan bagaimana individu mengelola kecemasan dan ketidakpastian dalam situasi komunikasi baru. Dalam konteks perpustakaan, teori AUM dapat diaplikasikan untuk memahami bagaimana mahasiswa baru mengelola kecemasan dan ketidakpastian yang mereka rasakan."),
  para("Teori AUM menjelaskan bahwa ketidakpastian berkaitan dengan ketidakmampuan seseorang untuk memprediksi dan menjelaskan perilaku orang lain maupun situasi yang dihadapinya, sementara kecemasan merupakan perasaan tidak nyaman yang muncul akibat ketidakpastian tersebut."),

  // ===== BAGIAN BARU: PSIKOLOGI PERPUSTAKAAN =====
  heading2("2.6. Psikologi Perpustakaan"),
  heading3("2.6.1. Pengertian Psikologi Perpustakaan"),
  para("Psikologi perpustakaan (library psychology) merupakan cabang ilmu terapan yang mengintegrasikan prinsip-prinsip psikologi ke dalam konteks layanan dan pengelolaan perpustakaan. Bidang ini mempelajari aspek-aspek perilaku, kognitif, emosional, dan sosial dari pengguna perpustakaan serta pengaruhnya terhadap cara mereka berinteraksi dengan sumber daya dan layanan informasi yang tersedia (Fister 2010)."),
  para("Secara lebih luas, psikologi perpustakaan dapat didefinisikan sebagai studi ilmiah tentang hubungan antara kondisi psikologis individu dengan aktivitas penggunaan perpustakaan, mencakup motivasi, persepsi, sikap, kecemasan, kepuasan, dan perilaku pencarian informasi pengguna. Ilmu ini berupaya memahami mengapa seseorang memanfaatkan atau tidak memanfaatkan perpustakaan, serta faktor-faktor psikologis apa saja yang memengaruhi efektivitas penggunaan layanan dan koleksi perpustakaan (Nahl and Bilal 2007)."),
  para([normal("Dalam konteks Indonesia, psikologi perpustakaan mulai mendapat perhatian seiring dengan berkembangnya kajian tentang perilaku pemustaka. Berbagai penelitian telah mengungkapkan bahwa kondisi psikologis seperti kecemasan ("), italic("library anxiety"), normal("), motivasi, dan efikasi diri memiliki pengaruh signifikan terhadap pemanfaatan perpustakaan, terutama di lingkungan perguruan tinggi (Rahayu and Rohmadi 2023). Dengan memahami psikologi pemustaka, pustakawan dan pengelola perpustakaan dapat merancang layanan dan lingkungan perpustakaan yang lebih kondusif dan ramah pengguna.")]),
  heading3("2.6.2. Ruang Lingkup Psikologi Perpustakaan"),
  para("Psikologi perpustakaan mencakup beberapa ruang lingkup kajian utama yang saling berkaitan:"),
  para([bold("a. Psikologi Kognitif dalam Perpustakaan")], false),
  para("Psikologi kognitif dalam perpustakaan berfokus pada bagaimana pengguna memproses, menyimpan, dan memanggil kembali informasi yang mereka peroleh. Aspek ini mencakup studi tentang persepsi pengguna terhadap sistem temu kembali informasi, strategi kognitif yang digunakan dalam pencarian informasi, serta beban kognitif (cognitive load) yang dialami pengguna saat mengoperasikan sistem perpustakaan digital (Kuhlthau 2004). Mahasiswa yang memiliki beban kognitif tinggi cenderung mengalami kebingungan dan frustrasi saat menggunakan sistem katalog atau database elektronik perpustakaan."),
  para([bold("b. Psikologi Emosional dan Afektif")], false),
  para([normal("Dimensi emosional dalam interaksi pemustaka dengan perpustakaan merupakan salah satu fokus utama psikologi perpustakaan. Emosi-emosi seperti kecemasan, frustrasi, ketidakberdayaan, maupun kepuasan dan kegembiraan semuanya berperan penting dalam menentukan kualitas pengalaman pengguna di perpustakaan. Kuhlthau (2004) dalam Information Search Process (ISP) Model-nya secara eksplisit mengidentifikasi bahwa proses pencarian informasi tidak hanya melibatkan aspek kognitif, tetapi juga dimensi afektif yang sangat memengaruhi perilaku pengguna. Pada tahap awal pencarian, pengguna seringkali merasakan ketidakpastian dan kecemasan; seiring dengan kemajuan pencarian dan ditemukannya informasi yang relevan, emosi berangsur berubah menjadi kepercayaan diri dan kepuasan.")]),
  para([bold("c. Psikologi Sosial dalam Konteks Perpustakaan")], false),
  para("Psikologi sosial menelaah bagaimana interaksi sosial di dalam perpustakaan memengaruhi perilaku pemustaka. Studi ini mencakup dinamika hubungan antara pemustaka dengan pustakawan (reference interview), pengaruh kelompok teman sebaya terhadap keputusan penggunaan perpustakaan, serta persepsi sosial tentang perpustakaan sebagai ruang publik (Agosto and Hughes-Hassell 2005). Temuan dalam bidang ini menunjukkan bahwa sikap dan perilaku pustakawan dalam melayani pemustaka sangat berpengaruh terhadap tingkat kecemasan dan kepuasan pemustaka (Yolanfika, et al 2023)."),
  para([bold("d. Psikologi Lingkungan Perpustakaan")], false),
  para("Psikologi lingkungan (environmental psychology) mengkaji bagaimana kondisi fisik dan desain ruang perpustakaan memengaruhi kondisi psikologis pengguna. Aspek-aspek seperti pencahayaan, akustik, tata letak ruang, warna interior, dan ketersediaan fasilitas yang nyaman terbukti berpengaruh terhadap konsentrasi, kenyamanan, dan produktivitas pemustaka (Nieves-whitmore 2021). Perpustakaan yang dirancang dengan mempertimbangkan aspek psikologi lingkungan dapat menciptakan suasana yang mendukung pembelajaran dan menurunkan tingkat kecemasan penggunanya."),
  heading3("2.6.3. Manfaat Psikologi Perpustakaan"),
  para("Penerapan psikologi perpustakaan memberikan berbagai manfaat nyata bagi pengembangan layanan dan pengelolaan perpustakaan, di antaranya:"),
  para([bold("a. Peningkatan Kualitas Layanan Perpustakaan")], false),
  para("Pemahaman mendalam tentang psikologi pengguna memungkinkan pustakawan untuk merancang layanan yang lebih responsif terhadap kebutuhan emosional dan kognitif pemustaka. Pustakawan yang memahami kondisi psikologis pengguna akan mampu memberikan layanan yang lebih empatik, sabar, dan efektif, terutama dalam menangani pemustaka yang mengalami kecemasan atau kebingungan (Jaya 2025). Pelayanan yang berorientasi psikologis ini terbukti dapat meningkatkan kepuasan pemustaka dan mendorong penggunaan perpustakaan yang lebih intensif."),
  para([bold("b. Pengurangan Library Anxiety")], false),
  para([normal("Salah satu manfaat terpenting dari penerapan psikologi perpustakaan adalah kemampuannya dalam mengidentifikasi dan mengatasi "), italic("library anxiety"), normal(". Dengan memahami akar psikologis dari kecemasan perpustakaan, pengelola dapat mengembangkan program-program intervensi yang tepat sasaran, seperti orientasi perpustakaan yang ramah, pembuatan panduan visual yang intuitif, serta pelatihan keterampilan literasi informasi yang terstruktur (Abizar Algipari et al. 2023).")]),
  para([bold("c. Optimalisasi Desain Ruang Perpustakaan")], false),
  para("Pengetahuan psikologi perpustakaan, khususnya psikologi lingkungan, memberikan landasan ilmiah bagi pengelola dalam mendesain atau merenovasi ruang perpustakaan. Desain yang mempertimbangkan faktor psikologis seperti kebutuhan privasi, kebutuhan akan interaksi sosial, pencahayaan yang optimal, dan tata letak yang intuitif dapat secara signifikan meningkatkan kenyamanan dan produktivitas pemustaka (Nieves-whitmore 2021)."),
  para([bold("d. Pengembangan Program Literasi Informasi yang Efektif")], false),
  para("Psikologi perpustakaan memberikan wawasan berharga tentang bagaimana cara terbaik menyampaikan keterampilan literasi informasi kepada pemustaka. Dengan memahami proses kognitif dan kondisi emosional mahasiswa dalam belajar menggunakan perpustakaan, pustakawan dapat merancang program instruksional yang lebih efektif, menarik, dan sesuai dengan kebutuhan psikologis pemustaka (Kuhlthau 2004)."),
  para([bold("e. Peningkatan Aksesibilitas dan Inklusi")], false),
  para("Psikologi perpustakaan juga berkontribusi pada upaya menjadikan perpustakaan lebih inklusif dan aksesibel bagi semua kelompok pengguna, termasuk mereka yang memiliki kebutuhan khusus. Pemahaman tentang kebutuhan psikologis kelompok marginal seperti mahasiswa penyandang disabilitas, mahasiswa dari latar belakang minoritas, atau mahasiswa baru yang belum familiar dengan lingkungan akademik memungkinkan pengembangan layanan yang lebih inklusif (Abdurokhim and Laugu 2024)."),
  heading3("2.6.4. Tujuan Psikologi Perpustakaan"),
  para("Psikologi perpustakaan sebagai bidang kajian memiliki beberapa tujuan utama yang saling mendukung:"),
  numbered("Memahami Perilaku Pemustaka: Tujuan pertama dan paling mendasar dari psikologi perpustakaan adalah memperoleh pemahaman yang komprehensif tentang perilaku, motivasi, dan kondisi psikologis pengguna perpustakaan. Pemahaman ini mencakup faktor-faktor yang mendorong atau menghambat penggunaan perpustakaan, serta bagaimana berbagai variabel psikologis seperti sikap, persepsi, dan emosi memengaruhi interaksi pemustaka dengan perpustakaan (Nahl and Bilal 2007)."),
  numbered("Meningkatkan Pengalaman Pengguna (User Experience): Psikologi perpustakaan bertujuan untuk mengoptimalkan pengalaman pengguna di perpustakaan agar lebih positif, menyenangkan, dan produktif. Hal ini dicapai melalui identifikasi hambatan psikologis yang ada, pengembangan solusi yang tepat, serta evaluasi berkelanjutan terhadap efektivitas intervensi yang dilakukan (Pang, Quinto, and Orillo 2025)."),
  numbered([normal("Mengurangi Hambatan Psikologis: Tujuan penting lainnya adalah mengidentifikasi dan mengurangi berbagai hambatan psikologis yang menghalangi pemustaka dalam memanfaatkan perpustakaan secara optimal. Hambatan-hambatan ini dapat berupa "), italic("library anxiety"), normal(", rendahnya efikasi diri, persepsi negatif tentang perpustakaan, atau kurangnya motivasi intrinsik dalam memanfaatkan sumber daya perpustakaan (Khasanah and Zatadini 2023).")]),
  numbered("Mendukung Pembelajaran dan Prestasi Akademik: Psikologi perpustakaan bertujuan untuk mendukung keberhasilan akademik mahasiswa dengan memastikan bahwa perpustakaan berfungsi sebagai lingkungan pembelajaran yang kondusif secara psikologis. Perpustakaan yang ramah secara psikologis akan mendorong mahasiswa untuk lebih aktif memanfaatkan sumber daya informasi yang tersedia, sehingga meningkatkan kualitas pembelajaran dan prestasi akademik mereka (Rahayu and Rohmadi 2023)."),
  numbered("Memandu Kebijakan dan Pengembangan Layanan: Psikologi perpustakaan menyediakan landasan ilmiah bagi pengambilan keputusan dalam pengembangan kebijakan dan layanan perpustakaan. Temuan-temuan dari penelitian psikologi perpustakaan dapat digunakan sebagai dasar dalam perumusan standar layanan, pengembangan program orientasi, desain sistem temu kembali informasi, serta perencanaan pengembangan koleksi yang lebih sesuai dengan kebutuhan psikologis pemustaka (Syukrinur 2022)."),
  numbered("Mengembangkan Kompetensi Psikologis Pustakawan: Psikologi perpustakaan juga bertujuan untuk meningkatkan kesadaran dan kompetensi pustakawan dalam memahami dan merespons kondisi psikologis pemustaka. Pustakawan yang memiliki pemahaman psikologi yang baik akan mampu memberikan layanan yang lebih humanis, empati, dan efektif dalam membantu pemustaka mengatasi tantangan yang mereka hadapi (Yolanfika, et al 2023)."),
  heading3("2.6.5. Hubungan Psikologi Perpustakaan dengan Library Anxiety"),
  para([normal("Psikologi perpustakaan dan "), italic("library anxiety"), normal(" memiliki hubungan yang sangat erat. Library anxiety merupakan salah satu topik utama dalam kajian psikologi perpustakaan, dan pemahaman tentang psikologi perpustakaan memberikan kerangka konseptual yang komprehensif untuk menjelaskan fenomena kecemasan ini. Dari perspektif psikologi kognitif, library anxiety dapat dipahami sebagai akibat dari kelebihan beban kognitif (cognitive overload) yang dialami mahasiswa saat menghadapi kompleksitas sistem perpustakaan (Kuhlthau 2004).")]),
  para([normal("Dari perspektif psikologi emosional, "), italic("library anxiety"), normal(" mencerminkan respons afektif negatif terhadap lingkungan perpustakaan yang dirasa mengancam atau tidak familiar. Sementara dari perspektif psikologi sosial, kecemasan ini dapat diperkuat atau diperlemah oleh dinamika interaksi sosial yang terjadi di dalam perpustakaan, baik antara pemustaka dengan pustakawan maupun antara pemustaka dengan sesama pengguna lainnya (Mellon 1986).")]),
  para([normal("Dengan demikian, psikologi perpustakaan memberikan pemahaman yang lebih holistik dan mendalam tentang "), italic("library anxiety"), normal(", serta menawarkan berbagai pendekatan intervensi berbasis bukti untuk mengatasi permasalahan ini. Dalam konteks penelitian ini, pemahaman tentang psikologi perpustakaan menjadi fondasi penting dalam menganalisis pengaruh "), italic("library anxiety"), normal(" terhadap pemenuhan kebutuhan informasi mahasiswa baru di Perpustakaan X.")]),
  
  // ===== PENELITIAN SEJENIS =====
  heading2("2.7. Penelitian Sejenis Sebelumnya"),
  para("Beberapa penelitian terdahulu yang relevan dengan topik library anxiety di perpustakaan perguruan tinggi telah banyak dilakukan, baik di tingkat nasional maupun internasional. (Ravena and Dewi 2021) melakukan penelitian kualitatif dengan pendekatan studi kasus tentang library anxiety pada mahasiswa tingkat akhir di UPT Perpustakaan Politeknik Negeri Semarang. Hasil penelitian menunjukkan bahwa library anxiety pada masing-masing mahasiswa tingkat akhir memiliki pengalaman yang berbeda-beda, dengan dua faktor yang paling banyak dialami, yaitu pemahaman tentang tata cara penggunaan perpustakaan dan kenyamanan dalam menggunakan teknologi."),
  para("(Yuliana and Syahputra 2022) meneliti pengaruh transformasi digital terhadap library anxiety di UPT Perpustakaan UIN Ar-Raniry Banda Aceh dengan metode kuantitatif deskriptif dan sampel sebanyak 100 pemustaka. (Khasanah and Zatadini 2023) meneliti pengaruh library anxiety dalam akses layanan referensi mahasiswa di UPT Perpustakaan IAIN Kediri, menemukan bahwa library anxiety berpengaruh sebesar 49,4% terhadap akses layanan referensi. (Abizar Algipari et al. 2023) meneliti fenomena library anxiety di Perpustakaan UPI dengan metode kualitatif. Rohmadi (2024) meneliti pengaruh kecemasan perpustakaan terhadap pemenuhan kebutuhan informasi pemustaka di UIN Sunan Kalijaga Yogyakarta, menemukan pengaruh sebesar 64,2%."),
  para("(Abdurokhim and Laugu 2024) secara khusus meneliti library anxiety pada mahasiswa baru penyandang disabilitas tunanetra di Perpustakaan UIN Sunan Kalijaga Yogyakarta, menggunakan metode kualitatif dengan pendekatan deskriptif. Berbagai penelitian tersebut memperkuat posisi library anxiety sebagai fenomena yang nyata dan perlu mendapat perhatian serius dari pengelola perpustakaan perguruan tinggi."),

  // ===== KERANGKA KONSEPTUAL =====
  heading2("2.8. Kerangka Konseptual"),
  para("Kerangka konseptual dalam penelitian ini dibangun berdasarkan sintesis teori-teori yang telah diuraikan pada sub-bab sebelumnya, khususnya teori Library Anxiety Mellon (1986), Library Anxiety Scale Bostick (1993), teori Anxiety Uncertainty Management (AUM) oleh Gudykunst, konsep psikologi perpustakaan, serta teori kebutuhan informasi dalam konteks pemustaka perguruan tinggi."),
  para([normal("Penelitian ini berfokus pada hubungan antara dua variabel utama, yaitu "), italic("Library Anxiety"), normal(" sebagai variabel independen (X) dan Pemenuhan Kebutuhan Informasi sebagai variabel dependen (Y). Kecemasan perpustakaan yang dialami oleh mahasiswa baru diduga berpengaruh terhadap kemampuan mereka dalam memenuhi kebutuhan informasi akademis melalui layanan perpustakaan.")]),
  new Paragraph({
    spacing: { before: 200, after: 200 },
    alignment: AlignmentType.CENTER,
    children: [bold("Variabel X: Library Anxiety (Kecemasan Perpustakaan)", 24)]
  }),
  para("Berdasarkan instrumen AQAK: Library Anxiety Scale for Undergraduates Students dan Library Anxiety Scale (LAS) Bostick (1993), library anxiety dalam penelitian ini diukur melalui lima dimensi:"),
  numbered("Hambatan Pengetahuan tentang Perpustakaan (Library Knowledge Barriers): Ketidaktahuan pemustaka tentang tata cara penggunaan perpustakaan, sistem klasifikasi koleksi, dan prosedur layanan."),
  numbered("Hambatan dengan Staf Perpustakaan (Barriers with Staff): Perasaan segan, takut, atau tidak nyaman dalam berinteraksi dan bertanya kepada pustakawan."),
  numbered("Hambatan Kenyamanan dengan Perpustakaan (Library Comfort Barriers): Perasaan tidak nyaman, tertekan, atau terasing saat berada di dalam lingkungan fisik perpustakaan."),
  numbered("Hambatan Afektif (Affective Barriers): Perasaan cemas, khawatir, tidak percaya diri, atau rendah diri yang muncul dalam konteks penggunaan perpustakaan."),
  numbered("Hambatan Mekanis dan Teknologi (Mechanical and Technological Barriers): Kesulitan dan kecemasan dalam menggunakan perangkat teknologi perpustakaan, seperti OPAC, komputer, dan database digital."),
  new Paragraph({
    spacing: { before: 200, after: 200 },
    alignment: AlignmentType.CENTER,
    children: [bold("Variabel Y: Pemenuhan Kebutuhan Informasi", 24)]
  }),
  para("Pemenuhan kebutuhan informasi dalam penelitian ini mengacu pada kemampuan mahasiswa baru dalam menemukan, mengakses, dan memanfaatkan sumber informasi yang tersedia di Perpustakaan X untuk keperluan akademik. Variabel ini diukur berdasarkan beberapa indikator:"),
  numbered("Kemampuan menemukan informasi yang dibutuhkan (koleksi buku, jurnal, sumber digital)."),
  numbered("Kemampuan mengakses layanan dan fasilitas perpustakaan secara mandiri."),
  numbered("Kemampuan memanfaatkan informasi yang ditemukan untuk keperluan perkuliahan dan tugas akademik."),
  numbered("Tingkat kepuasan dalam proses pencarian dan pemanfaatan informasi di perpustakaan."),
  new Paragraph({
    spacing: { before: 200, after: 200 },
    alignment: AlignmentType.CENTER,
    children: [bold("Hubungan Antar Variabel", 24)]
  }),
  para([normal("Berdasarkan kerangka teori yang telah dibangun, penelitian ini mengajukan proposisi bahwa "), italic("library anxiety"), normal(" (X) berpengaruh negatif terhadap pemenuhan kebutuhan informasi (Y) mahasiswa baru di Perpustakaan X. Artinya, semakin tinggi tingkat kecemasan perpustakaan yang dialami mahasiswa baru, maka semakin rendah kemampuan mereka dalam memenuhi kebutuhan informasi akademik melalui perpustakaan. Proposisi ini sejalan dengan temuan (Rahayu and Rohmadi 2023) yang menemukan koefisien determinasi sebesar 64,2% dalam hubungan antara kecemasan perpustakaan dan pemenuhan kebutuhan informasi.")]),
  para("Psikologi perpustakaan berfungsi sebagai perspektif payung (overarching perspective) dalam penelitian ini yang menjembatani pemahaman tentang kondisi psikologis mahasiswa baru dengan pengalaman mereka dalam menggunakan perpustakaan. Teori AUM (Anxiety Uncertainty Management) Gudykunst memberikan penjelasan tentang mekanisme psikologis yang mendasari munculnya kecemasan dalam situasi baru seperti penggunaan perpustakaan perguruan tinggi untuk pertama kalinya."),
  new Paragraph({
    spacing: { before: 240, after: 120 },
    alignment: AlignmentType.CENTER,
    children: [bold("Gambar 2.1. Kerangka Konseptual Penelitian", 22)]
  }),

  // Table representing conceptual framework
  new Table({
    alignment: AlignmentType.CENTER,
    width: { size: 8000, type: WidthType.DXA },
    columnWidths: [3200, 800, 3200, 800],
    rows: [
      new TableRow({
        children: [
          new TableCell({
            width: { size: 3200, type: WidthType.DXA },
            shading: { fill: "D5E8F0", type: ShadingType.CLEAR },
            margins: { top: 120, bottom: 120, left: 180, right: 180 },
            borders: {
              top: { style: BorderStyle.SINGLE, size: 2, color: "2E75B6" },
              bottom: { style: BorderStyle.SINGLE, size: 2, color: "2E75B6" },
              left: { style: BorderStyle.SINGLE, size: 2, color: "2E75B6" },
              right: { style: BorderStyle.SINGLE, size: 2, color: "2E75B6" },
            },
            children: [
              new Paragraph({ alignment: AlignmentType.CENTER, spacing: { before: 60, after: 40 }, children: [bold("Variabel X", 22)] }),
              new Paragraph({ alignment: AlignmentType.CENTER, spacing: { before: 40, after: 40 }, children: [bold("Library Anxiety", 22)] }),
              new Paragraph({ alignment: AlignmentType.CENTER, spacing: { before: 40, after: 20 }, children: [normal("(Kecemasan Perpustakaan)", 20)] }),
              new Paragraph({ alignment: AlignmentType.LEFT, spacing: { before: 80, after: 20 }, children: [normal("Dimensi:", 20)] }),
              new Paragraph({ alignment: AlignmentType.LEFT, spacing: { before: 20, after: 20 }, children: [normal("1. Hambatan Pengetahuan", 20)] }),
              new Paragraph({ alignment: AlignmentType.LEFT, spacing: { before: 10, after: 20 }, children: [normal("2. Hambatan dengan Staf", 20)] }),
              new Paragraph({ alignment: AlignmentType.LEFT, spacing: { before: 10, after: 20 }, children: [normal("3. Hambatan Kenyamanan", 20)] }),
              new Paragraph({ alignment: AlignmentType.LEFT, spacing: { before: 10, after: 20 }, children: [normal("4. Hambatan Afektif", 20)] }),
              new Paragraph({ alignment: AlignmentType.LEFT, spacing: { before: 10, after: 80 }, children: [normal("5. Hambatan Teknologi", 20)] }),
            ]
          }),
          new TableCell({
            width: { size: 800, type: WidthType.DXA },
            margins: { top: 120, bottom: 120, left: 60, right: 60 },
            verticalAlign: "center",
            borders: {
              top: { style: BorderStyle.NONE, size: 0, color: "FFFFFF" },
              bottom: { style: BorderStyle.NONE, size: 0, color: "FFFFFF" },
              left: { style: BorderStyle.NONE, size: 0, color: "FFFFFF" },
              right: { style: BorderStyle.NONE, size: 0, color: "FFFFFF" },
            },
            children: [new Paragraph({ alignment: AlignmentType.CENTER, children: [bold("→", 32)] })]
          }),
          new TableCell({
            width: { size: 3200, type: WidthType.DXA },
            shading: { fill: "E2EFD9", type: ShadingType.CLEAR },
            margins: { top: 120, bottom: 120, left: 180, right: 180 },
            borders: {
              top: { style: BorderStyle.SINGLE, size: 2, color: "375623" },
              bottom: { style: BorderStyle.SINGLE, size: 2, color: "375623" },
              left: { style: BorderStyle.SINGLE, size: 2, color: "375623" },
              right: { style: BorderStyle.SINGLE, size: 2, color: "375623" },
            },
            children: [
              new Paragraph({ alignment: AlignmentType.CENTER, spacing: { before: 60, after: 40 }, children: [bold("Variabel Y", 22)] }),
              new Paragraph({ alignment: AlignmentType.CENTER, spacing: { before: 40, after: 40 }, children: [bold("Pemenuhan Kebutuhan", 22)] }),
              new Paragraph({ alignment: AlignmentType.CENTER, spacing: { before: 0, after: 40 }, children: [bold("Informasi", 22)] }),
              new Paragraph({ alignment: AlignmentType.LEFT, spacing: { before: 80, after: 20 }, children: [normal("Indikator:", 20)] }),
              new Paragraph({ alignment: AlignmentType.LEFT, spacing: { before: 20, after: 20 }, children: [normal("1. Kemampuan Menemukan", 20)] }),
              new Paragraph({ alignment: AlignmentType.LEFT, spacing: { before: 10, after: 20 }, children: [normal("   Informasi", 20)] }),
              new Paragraph({ alignment: AlignmentType.LEFT, spacing: { before: 10, after: 20 }, children: [normal("2. Kemampuan Mengakses", 20)] }),
              new Paragraph({ alignment: AlignmentType.LEFT, spacing: { before: 10, after: 20 }, children: [normal("3. Kemampuan Memanfaatkan", 20)] }),
              new Paragraph({ alignment: AlignmentType.LEFT, spacing: { before: 10, after: 80 }, children: [normal("4. Tingkat Kepuasan", 20)] }),
            ]
          }),
          new TableCell({
            width: { size: 800, type: WidthType.DXA },
            margins: { top: 120, bottom: 120, left: 60, right: 60 },
            verticalAlign: "center",
            borders: {
              top: { style: BorderStyle.NONE, size: 0, color: "FFFFFF" },
              bottom: { style: BorderStyle.NONE, size: 0, color: "FFFFFF" },
              left: { style: BorderStyle.NONE, size: 0, color: "FFFFFF" },
              right: { style: BorderStyle.NONE, size: 0, color: "FFFFFF" },
            },
            children: [new Paragraph({ alignment: AlignmentType.CENTER, children: [normal("", 14)] })]
          }),
        ]
      })
    ]
  }),
  new Paragraph({ spacing: { before: 80, after: 80 }, alignment: AlignmentType.CENTER, children: [italic("Sumber: Dikembangkan dari Mellon (1986), Bostick (1993), Rahayu & Rohmadi (2023)", 20)] }),
  para("Kerangka konseptual di atas menggambarkan bahwa library anxiety yang dialami mahasiswa baru (Variabel X) berdampak langsung terhadap kemampuan mereka dalam memenuhi kebutuhan informasi akademik melalui perpustakaan (Variabel Y). Penelitian ini menggunakan pendekatan kuantitatif dengan instrumen kuesioner skala Likert untuk mengukur kedua variabel tersebut secara empiris di Perpustakaan X."),
  pageBreak(),
];

// ---- BAB III ----
const bab3 = [
  heading1("BAB III"),
  heading1("METODOLOGI PENELITIAN"),
  heading2("3.1. Jenis Penelitian"),
  para("Penelitian ini menggunakan pendekatan kuantitatif, yaitu metode penelitian yang berlandaskan pada filsafat positivisme, digunakan untuk meneliti populasi atau sampel tertentu, teknik pengambilan sampel pada umumnya dilakukan secara random, pengumpulan data menggunakan instrumen penelitian, analisis data bersifat kuantitatif/statistik dengan tujuan untuk menguji hipotesis yang telah ditetapkan (Sugiyono, 2019)."),
  para("Pendekatan kuantitatif, yang seringkali terkait dengan angka dan statistik, memberikan kekuatan analitis yang kuat untuk memahami hubungan antar variabel. Sementara itu, pendekatan kualitatif menawarkan kedalaman dalam memahami dinamika sosial dan konteks yang kompleks (Arif Rachman et al, 2024)."),
  para("Disebut sebagai metode tradisional karena telah digunakan sejak lama dan menjadi kebiasaan dalam penelitian. Selain itu, metode ini dinamakan positivistik karena berlandaskan pada filsafat positivisme. Metode kuantitatif juga disebut ilmiah karena memenuhi prinsip-prinsip keilmuan, seperti bersifat konkret, empiris, objektif, terukur, rasional, dan tersusun secara sistematis."),
  para("Penelitian kuantitatif pada dasarnya memandang tingkah laku manusia dapat diramal dan realitas sosial bersifat objektif serta dapat diukur dengan instrumen yang telah terstandarisasi (Syahrizal and Jailani 2023). Dengan demikian, penelitian ini berupaya mengukur fenomena yang diteliti melalui angket/kuesioner yang terstruktur dan dianalisis menggunakan teknik statistik yang relevan."),
  heading2("3.2. Data dan Sumber Data"),
  para("Data merupakan kumpulan fakta, informasi, atau bahan mentah yang dikumpulkan selama proses penelitian untuk kemudian diolah, dianalisis, dan diinterpretasikan guna menjawab pertanyaan penelitian (Hildawati et al. 2024). Dalam penelitian ini, data yang dikumpulkan terdiri dari dua jenis berdasarkan sumbernya."),
  heading3("3.2.1. Data Primer"),
  para("Data primer adalah data yang diperoleh langsung dari sumber aslinya melalui observasi, survei, atau eksperimen, yang biasanya dianggap lebih akurat dan relevan karena langsung terkait dengan konteks penelitian (Hildawati et al. 2024). Dalam penelitian ini, data primer diperoleh melalui kuesioner yang disebarkan langsung kepada responden yang menjadi sampel penelitian."),
  heading3("3.2.2. Data Sekunder"),
  para("Data sekunder adalah data yang berasal dari literatur, laporan, atau database yang sudah ada sebelumnya (Hildawati et al. 2024). Data sekunder dalam penelitian ini bersumber dari buku-buku referensi, jurnal ilmiah, laporan penelitian terdahulu, serta dokumen-dokumen resmi yang relevan dengan topik penelitian."),
  heading2("3.3. Teknik Pengumpulan Data"),
  para("Teknik Pengumpulan Data Kuantitatif adalah proses untuk mengumpulkan informasi yang dapat diukur dan dihitung secara numerik. Tujuannya adalah untuk mengidentifikasi pola, tren, atau hubungan antara variabel-variabel tertentu."),
  heading3("3.3.1. Kuesioner"),
  para("Penggunaan kuesioner sebagai teknik pengumpulan data kuantitatif telah menjadi salah satu pendekatan yang umum digunakan dalam riset ilmiah. Menurut Creswell (2014), kuesioner adalah alat yang dirancang untuk mengumpulkan informasi dari responden dalam bentuk jawaban tertulis atas serangkaian pertanyaan yang telah disiapkan peneliti. Kuesioner yang digunakan dalam penelitian ini adalah kuesioner tertutup dengan skala Likert."),
  para("Skala Likert berisikan 5 (lima) tingkatan jawaban sebagai berikut:"),
  // Likert table
  new Table({
    width: { size: 6000, type: WidthType.DXA },
    columnWidths: [1500, 3000, 1500],
    rows: [
      new TableRow({
        tableHeader: true,
        children: ["Skor","Tingkatan","Singkatan"].map(t => new TableCell({
          width: { size: t === "Tingkatan" ? 3000 : 1500, type: WidthType.DXA },
          shading: { fill: "2E75B6", type: ShadingType.CLEAR },
          margins: { top: 80, bottom: 80, left: 120, right: 120 },
          borders: { top: { style: BorderStyle.SINGLE, size: 1, color: "FFFFFF" }, bottom: { style: BorderStyle.SINGLE, size: 1, color: "FFFFFF" }, left: { style: BorderStyle.SINGLE, size: 1, color: "FFFFFF" }, right: { style: BorderStyle.SINGLE, size: 1, color: "FFFFFF" } },
          children: [new Paragraph({ alignment: AlignmentType.CENTER, children: [new TextRun({ text: t, bold: true, size: 22, color: "FFFFFF", font: "Times New Roman" })] })]
        }))
      }),
      ...[[5,"Sangat Setuju","SS"],[4,"Setuju","S"],[3,"Netral","N"],[2,"Tidak Setuju","TS"],[1,"Sangat Tidak Setuju","STS"]].map(([s,t,sg]) =>
        new TableRow({ children: [String(s),String(t),String(sg)].map((val, i) => new TableCell({
          width: { size: i === 1 ? 3000 : 1500, type: WidthType.DXA },
          margins: { top: 80, bottom: 80, left: 120, right: 120 },
          borders: { top: { style: BorderStyle.SINGLE, size: 1, color: "CCCCCC" }, bottom: { style: BorderStyle.SINGLE, size: 1, color: "CCCCCC" }, left: { style: BorderStyle.SINGLE, size: 1, color: "CCCCCC" }, right: { style: BorderStyle.SINGLE, size: 1, color: "CCCCCC" } },
          children: [new Paragraph({ alignment: AlignmentType.CENTER, children: [normal(val)] })]
        })) })
      )
    ]
  }),
  emptyLine(),
  heading3("3.3.2. Dokumentasi"),
  para("Dokumentasi, dari asal kata dokumen, yang artinya barang-barang tertulis. Di dalam melaksanakan metode dokumentasi, penelitian menyelidiki hal-hal berupa transkip, catatan, buku, surat, prasasti, notulen rapat, agenda, arsip, jurnal, video dan sebagainya. Dokumentasi dilakukan untuk melengkapi data yang tidak bisa diperoleh melalui kuesioner serta untuk memperkuat data primer yang telah dikumpulkan."),
  heading2("3.4. Teknik Analisis Data"),
  para("Data penelitian kuantitatif yang telah dikumpulkan melalui kegiatan lapangan pada dasarnya masih berupa data mentah (raw data). Untuk dapat menggunakan data sebagai landasan empiris dalam menjawab rumusan masalah atau menguji hipotesis penelitian, maka perlu dilakukan rangkaian proses pengolahan serta analisis data. Kegiatan analisis data dalam penelitian kuantitatif meliputi pengolahan dan penyajian data, melakukan berbagai perhitungan untuk mendeskripsikan data, dan melakukan analisis untuk menguji hipotesis."),
  para("Perhitungan dan analisis data kuantitatif dilakukan dengan menggunakan Teknik Statistik, yang mencakup:"),
  bulletPara("Pengeditan Data (Editing)"),
  bulletPara("Coding dan Transformasi Data"),
  bulletPara("Tabulasi Data: memasukkan data pada tabel-tabel tertentu dan mengatur angka-angka serta menghitungnya."),
  heading2("3.5. Teknik Penyajian Data"),
  para("Penyajian data merupakan bagian yang tidak terpisahkan dari keseluruhan proses penelitian. Dengan penyajian yang baik, proses analisis data menjadi lebih mudah dan efisien, serta memungkinkan pembaca untuk mendapatkan gambaran yang bermakna dari data yang disajikan."),
  para("Dalam penelitian ini, data disajikan dalam beberapa bentuk sebagai berikut:"),
  bulletPara("Penyajian dalam Bentuk Tabel: Tabel merupakan bentuk penyajian data yang paling umum digunakan dalam penelitian kuantitatif. Penyajian data dalam bentuk tabel memudahkan pembaca dalam membaca dan membandingkan data secara sistematis."),
  bulletPara("Penyajian dalam Bentuk Grafik dan Diagram: Grafik atau diagram biasanya dibuat berdasarkan tabel dan merupakan visualisasi data pada tabel yang bersangkutan. Bentuk grafik yang digunakan antara lain diagram batang (bar chart), diagram lingkaran (pie chart), dan histogram."),
  bulletPara("Penyajian dalam Bentuk Narasi/Deskripsi: Selain tabel dan grafik, data juga disajikan dalam bentuk narasi atau deskripsi verbal untuk menjelaskan dan menginterpretasikan hasil analisis statistik."),
  pageBreak(),
];

// ---- DAFTAR PUSTAKA ----
const daftarPustaka = [
  heading1("DAFTAR PUSTAKA"),
  // Original references
  ...[
    "Abdurokhim, Muhamad, and Nurdin Laugu. 2024. \"Library Anxiety Pada Mahasiswa Baru Penyandang Disabilitas Tunanetra Di Perpustakaan UIN Sunan Kalijaga Yogyakarta.\" Pustaka Karya: Jurnal Ilmiah Ilmu Perpustakaan dan Informasi 12(2): 121–36.",
    "Abizar Algipari, Farahdiba Fajrina, Fauziyah Azizah, Taghsya Aghniya Yasyfa, Wanda Nadriah Fajrianti Rabbah, and Ahmad Fuadin. 2023. \"Edu Lib.\" EDULIB: Journal of Library and Information Science 13(2): 200–209.",
    "Agosto, D. E., and S. Hughes-Hassell. 2005. People, Places, and Questions: An Investigation of the Everyday Life Information-Seeking Behaviors of Urban Young Adults. Library & Information Science Research, 27(2): 141–163.",
    "Arif Rachman, Yochanan, Andi Ilham Samanlangi, Hery Purnomo. 2024. Metode Penelitian Kuantitatif, Kualitatif dan R&D. Karawang: CV Saba Jaya Publisher.",
    "Fister, B. 2010. Fear of Reference. Chronicle of Higher Education. The Library Babel Fish. https://www.chronicle.com/blogs/librarybabelfish",
    "Hildawati, Lalu Suhirman, Bayu Fitrah Prisuna, Liza Husnita, Budi Mardikawati, Santi Isnaini, Wakhyudin, et al. 2024. Buku Ajar Metodologi Penelitian Kuantitatif & Aplikasi Pengolahan Analisis Data Statistik. Cet 1. Jambi: PT. Sonpedia Publishing Indonesia.",
    "Jaya, IN. Sutrisna. 2025. \"Membangun Budaya Literasi Digital.\" Media Sains Informasi dan Perpustakaan 5(2): 11–21.",
    "Khasanah, Uswatun, and Indah Galuh Zatadini. 2023. \"Pengaruh Library Anxiety Dalam Akses Layanan Referensi Mahasiswa Di Upt Perpustakaan IAIN Kediri.\" Publis Journal: Publication Library and Information Science 7(1): 60–76.",
    "Kuhlthau, C. C. 2004. Seeking Meaning: A Process Approach to Library and Information Services. 2nd ed. Westport, CT: Libraries Unlimited.",
    "Mcpherson, Marisa Alicia. 2015. \"Library Anxiety among University Students: A Survey.\" Journal of Information & Library Science 41(4): 317–25.",
    "Mellon, Constance A. 1986. \"Library Anxiety: A Grounded Theory and Its Development.\" College & Research Libraries 47(2): 160–65.",
    "Nahl, D., and D. Bilal (Eds.). 2007. Information and Emotion: The Emergent Affective Paradigm in Information Behavior Research and Theory. Medford, NJ: Information Today.",
    "Nieves-whitmore, Kaeli. 2021. \"The Design of Academic Library.\" Library Hi Tech News 38(5): 1–4.",
    "Pang, Nan, Joana Quinto, and Jhoanne Orillo. 2025. \"Integrating Systematic Review and Instrument Development: A Study on Library Usage Anxiety and Satisfaction in Chinese Higher Education.\" Social Sciences & Humanities Open 12: 101973.",
    "Permatasari, Retno, Miftahul Arifin, and Raup Padilah. 2021. \"Studi Deskriptif Dampak Psikologis Mahasiswa Program Studi Bimbingan dan Konseling Universitas PGRI Banyuwangi.\" Jurnal Bina Ilmu Cendikia 2(1): 128–41.",
    "Praja, Bayu Amengku, and Defrin Donna Kusuma. 2024. \"Tingkat Library Anxiety Mahasiswa Terhadap Pemanfaatan Layanan Jurnal Elektronik (Studi Pada Perpustakaan Universitas Brawijaya).\" JUREMI: Jurnal Riset Ekonomi 3(6): 713–28.",
    "Rahayu, Rahayu, and Djazim Rohmadi. 2023. \"Pengaruh Kecemasan Di Perpustakaan Terhadap Pemenuhan Kebutuhan Informasi Pemustaka Pada Perpustakaan UIN Sunan Kalijaga Yogyakarta.\" Fihris: Jurnal Ilmu Perpustakaan dan Informasi 18(1): 96–113.",
    "Ramadhan, Riki Dinul, Astin Yendani, Wirdatul Khunsa, and Vita Amelia. 2025. \"Analisis Kebutuhan Informasi Mahasiswa Fakultas Hukum Di Universitas Lancang Kuning.\" Libraria: Jurnal Ilmu Perpustakaan dan Informasi 14(2): 161–70.",
    "Ravena, Rika, and Athanasia Octaviani Puspita Dewi. 2021. \"Library Anxiety Pada Mahasiswa Tingkat Akhir: Studi Kualitatif Di UPT Perpustakaan Politeknik Negeri Semarang.\" Anuva: Jurnal Kajian Budaya, Perpustakaan, dan Informasi 5(4): 527–42.",
    "Reva Andini, Raudatul Ulfa, Debora Kristian Sitanggang, and Vita Amelia. 2024. \"Analisis Kesesuaian Koleksi Berdasarkan Kebutuhan Mahasiswa Program Studi Kehutanan.\" TADWIN: Jurnal Ilmu Perpustakaan dan Informasi 5(2): 159–66.",
    "Syahrizal, Hasan, and M.Syahran Jailani. 2023. \"Jenis-Jenis Pengumpulan Data Dalam Penelitian Kualitatif.\" QOSIM Jurnal Pendidikan Sosial & Humaniora 1(1): 13–23.",
    "Syukrinur. 2022. \"Revitalisasi Fungsi Perpustakaan Perguruan Tinggi: Upaya Peningkatan Kualitas Layanan Dan Pembelajaran.\" LIBRIA 14(2): 247–57.",
    "Wafa Huwaiza Alwannia, Azarine Nuhaa Callista Luqman Nanda, and Prijana. 2025. \"Hubungan Antara Kebutuhan Informasi Dengan Preferensi Pemilihan Buku Cetak Dan Digital Di Kalangan Mahasiswa.\" Palimpsest: Jurnal Ilmu Informasi dan Perpustakaan 16(2): 150–62.",
    "Yolanfika, Alvina, Nurhayani Nurhayani, and Yusniah Yusniah. 2023. \"Upaya Pustakawan Dalam Menghadapi Library Anxiety Di Perpustakaan Dan Kearsipan Daerah Kota Langsa.\" Edu Society: Jurnal Pendidikan, Ilmu Sosial Dan Pengabdian Kepada Masyarakat 3(1): 902–12.",
    "Yuliana, Cut Putroe, and Hisyam Syahputra. 2022. \"Pengaruh Transformasi Digital Terhadap Library Anxiety Di UPT. Perpustakaan UIN Ar-Raniry Banda Aceh.\" JIPIS: Jurnal Ilmu Perpustakaan dan Informasi Islam 1(1): 54–59.",
  ].map(ref => new Paragraph({
    spacing: { before: 60, after: 60, line: 320 },
    indent: { left: 720, hanging: 720 },
    children: [normal(ref, 22)]
  }))
];

const doc = new Document({
  numbering: {
    config: [
      {
        reference: "bullets",
        levels: [{ level: 0, format: LevelFormat.BULLET, text: "\u2022", alignment: AlignmentType.LEFT, style: { paragraph: { indent: { left: 720, hanging: 360 } } } }]
      },
      {
        reference: "numbers",
        levels: [{ level: 0, format: LevelFormat.DECIMAL, text: "%1.", alignment: AlignmentType.LEFT, style: { paragraph: { indent: { left: 720, hanging: 360 } } } }]
      }
    ]
  },
  styles: {
    default: {
      document: { run: { font: "Times New Roman", size: 24 } }
    },
    paragraphStyles: [
      { id: "Heading1", name: "Heading 1", basedOn: "Normal", next: "Normal", quickFormat: true, run: { size: 28, bold: true, font: "Times New Roman" }, paragraph: { spacing: { before: 400, after: 200 }, outlineLevel: 0, alignment: AlignmentType.CENTER } },
      { id: "Heading2", name: "Heading 2", basedOn: "Normal", next: "Normal", quickFormat: true, run: { size: 26, bold: true, font: "Times New Roman" }, paragraph: { spacing: { before: 300, after: 150 }, outlineLevel: 1 } },
      { id: "Heading3", name: "Heading 3", basedOn: "Normal", next: "Normal", quickFormat: true, run: { size: 24, bold: true, font: "Times New Roman" }, paragraph: { spacing: { before: 240, after: 120 }, outlineLevel: 2 } },
    ]
  },
  sections: [{
    properties: {
      page: {
        size: { width: 11906, height: 16838 },
        margin: { top: 1440, right: 1440, bottom: 1440, left: 1800 }
      }
    },
    children: [
      ...titlePage,
      ...daftarIsi,
      ...bab1,
      ...bab2,
      ...bab3,
      ...daftarPustaka,
    ]
  }]
});

Packer.toBuffer(doc).then(buffer => {
  require('fs').writeFileSync('/home/claude/metopel_with_bab2.docx', buffer);
  console.log('Done!');
});
