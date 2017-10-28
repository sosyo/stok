-- Veritabanı: `stok`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `tc` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `tel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `customers`
--

INSERT INTO `customers` (`id`, `tc`, `name`, `surname`, `tel`) VALUES
(1, 123, 'ada', 'asd', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `malzeme`
--

CREATE TABLE `malzeme` (
  `id` int(11) NOT NULL,
  `malzeme` varchar(25) NOT NULL,
  `barkod` int(11) NOT NULL,
  `demirbasno` varchar(25) NOT NULL,
  `tasinirkodu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `malzeme`
--

INSERT INTO `malzeme` (`id`, `malzeme`, `barkod`, `demirbasno`, `tasinirkodu`) VALUES
(1, 'e', 123, 'ad123', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `malzeme`
--
ALTER TABLE `malzeme`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `malzeme`
--
ALTER TABLE `malzeme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
