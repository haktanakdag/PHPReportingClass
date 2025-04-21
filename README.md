# 📊 PHPReportingClass

PHP ile HTML tabanlı raporlar oluşturmanın kolay ve hafif yolu: **PHPReportingClass**. Bu sınıf, dinamik olarak tablo oluşturmanızı sağlar ve sade arayüzüyle esnek bir yapı sunar.

![PHP Reporting Class](https://img.shields.io/badge/PHP-ReportingClass-blue)  
![License: MIT](https://img.shields.io/badge/license-MIT-green)

---

## ✨ Özellikler

- ✅ Dinamik HTML tablo üretimi  
- ✅ Kolay entegre edilebilir sınıf yapısı  
- ✅ Header ve veri seti tanımlama  
- ✅ Özelleştirilebilir CSS sınıfları  
- ✅ Hafif ve sade çözüm

---

## 📁 Dosya Yapısı

```
PHPReportingClass/
├── example.php          → Örnek kullanım dosyası
├── Reporting.php        → Ana sınıf dosyası
└── README.md            → Açıklama ve yönergeler
```

---

## ⚙️ Kurulum

Projeyi klonlayın veya doğrudan `Reporting.php` dosyasını projenize ekleyin:

```bash
git clone https://github.com/haktanakdag/PHPReportingClass.git
```

Kullanım için:

```php
require_once 'Reporting.php';
```

---

## 🚀 Hızlı Başlangıç

### 1. Sınıfı başlat

```php
$report = new Reporting();
```

### 2. Başlıkları tanımla

```php
$report->setHeaders(['ID', 'İsim', 'Soyisim', 'E-posta']);
```

### 3. Verileri ekle

```php
$data = [
    [1, 'Haktan', 'Akdağ', 'haktan@example.com'],
    [2, 'Ayşe', 'Yılmaz', 'ayse@example.com'],
];
$report->setRows($data);
```

### 4. Raporu oluştur

```php
echo $report->render();
```

---

## 💡 Örnek HTML Çıktı

```html
<table class="reporting-table">
  <thead>
    <tr>
      <th>ID</th>
      <th>İsim</th>
      <th>Soyisim</th>
      <th>E-posta</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Haktan</td>
      <td>Akdağ</td>
      <td>haktan@example.com</td>
    </tr>
    <tr>
      <td>2</td>
      <td>Ayşe</td>
      <td>Yılmaz</td>
      <td>ayse@example.com</td>
    </tr>
  </tbody>
</table>
```

---

## 🎨 Stil Özelleştirme

İstediğiniz CSS sınıflarını atayabilirsiniz:

```php
$report->setTableClass('table table-striped');
$report->setHeaderClass('table-header');
$report->setRowClass('table-row');
```

Varsayılan CSS ile gelen yapı:

```css
.reporting-table {
  width: 100%;
  border-collapse: collapse;
}
.reporting-table th, .reporting-table td {
  padding: 8px;
  border: 1px solid #ccc;
}
.reporting-table th {
  background-color: #f2f2f2;
}
```

---

## 🧪 Örnek Kullanım (`example.php`)

```php
require_once 'Reporting.php';

$report = new Reporting();
$report->setHeaders(['ID', 'İsim', 'E-posta']);
$report->setRows([
    [1, 'Haktan', 'haktan@example.com'],
    [2, 'Zeynep', 'zeynep@example.com']
]);
echo $report->render();
```

---

## 🤝 Katkı

Katkıda bulunmak isterseniz:

1. Fork'layın  
2. Yeni bir branch oluşturun (`feature/yenilik`)  
3. Değişikliklerinizi commit edin  
4. Pull request gönderin

---

## 📄 Lisans

Bu proje [MIT Lisansı](LICENSE) altında lisanslanmıştır. İstediğiniz gibi kullanabilir, geliştirebilirsiniz.

---

> Hazırlayan: [Haktan Akdağ](https://github.com/haktanakdag)  
> PHP ile şık ve basit raporlar oluşturun!
