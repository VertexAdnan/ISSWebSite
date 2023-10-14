INSERT INTO [vpanel_banners] ([banner_id], [banner], [main], [status]) VALUES (1, 'game-soul-sacrifice-500x375.jpg', 0, '1'); GO
INSERT INTO [vpanel_banners] ([banner_id], [banner], [main], [status]) VALUES (2, 'banner-bg.jpg', 1, '1'); GO
INSERT INTO [vpanel_banners] ([banner_id], [banner], [main], [status]) VALUES (3, 'game-soul-sacrifice-500x375.jpg', 0, '1'); GO
INSERT INTO [vpanel_banners] ([banner_id], [banner], [main], [status]) VALUES (4, 'game-soul-sacrifice-500x375.jpg', 0, '1'); GO
INSERT INTO [vpanel_banners] ([banner_id], [banner], [main], [status]) VALUES (5, 'game-soul-sacrifice-500x375.jpg', 0, '1'); GO
INSERT INTO [vpanel_banners] ([banner_id], [banner], [main], [status]) VALUES (6, 'game-soul-sacrifice-500x375.jpg', 0, '1'); GO
INSERT INTO [vpanel_coupon] ([coupon_id], [coupon], [dollar], [gc], [vipdays], [count], [used], [status]) VALUES (100000, 'test3423', 10000, 10000, 7, 2, 5, 1); GO
INSERT INTO [vpanel_coupon] ([coupon_id], [coupon], [dollar], [gc], [vipdays], [count], [used], [status]) VALUES (100001, 'test3444', 10000, 10000, 7, 2, 0, 1); GO
INSERT INTO [vpanel_coupon_log] ([log_id], [coupon_id], [CustomerID]) VALUES (1, 100000, 1002730); GO
INSERT INTO [vpanel_coupon_log] ([log_id], [coupon_id], [CustomerID]) VALUES (2, 100000, 1002730); GO
INSERT INTO [vpanel_coupon_log] ([log_id], [coupon_id], [CustomerID]) VALUES (3, 100000, 1002730); GO
INSERT INTO [vpanel_coupon_log] ([log_id], [coupon_id], [CustomerID]) VALUES (4, 100000, 1002730); GO
INSERT INTO [vpanel_coupon_log] ([log_id], [coupon_id], [CustomerID]) VALUES (5, 100000, 1002730); GO
INSERT INTO [vpanel_coupon_log] ([log_id], [coupon_id], [CustomerID]) VALUES (6, 100000, 1002730); GO
INSERT INTO [vpanel_coupon_log] ([log_id], [coupon_id], [CustomerID]) VALUES (7, 100000, 1002730); GO
INSERT INTO [vpanel_coupon_log] ([log_id], [coupon_id], [CustomerID]) VALUES (8, 100000, 1002730); GO
INSERT INTO [vpanel_coupon_log] ([log_id], [coupon_id], [CustomerID]) VALUES (9, 100000, 1002730); GO
INSERT INTO [vpanel_coupon_log] ([log_id], [coupon_id], [CustomerID]) VALUES (10, 100000, 1002730); GO
INSERT INTO [vpanel_downloads] ([download_id], [title], [link]) VALUES (2, 'Launcher Google Drive', 'https://drive.google.com/file/d/1NWrF3XNbPlnE0-prIr1J-B8lGoK7EuqW/view?usp=drive_link'); GO
INSERT INTO [vpanel_downloads] ([download_id], [title], [link]) VALUES (3, 'Full Client Google Drive', 'https://drive.google.com/file/d/1j5H5q3nyPmOkJ2nSDyyJF27lE29X1sjy/view'); GO
INSERT INTO [vpanel_market] ([market_id], [title]) VALUES (1, 'GC Fiyatları'); GO
INSERT INTO [vpanel_market] ([market_id], [title]) VALUES (2, 'VIP Fiyatları'); GO
INSERT INTO [vpanel_market_item] ([item_id], [market_id], [title], [price], [attributes]) VALUES (1, 1, '10000 GC', 100, 'test, test'); GO
INSERT INTO [vpanel_market_item] ([item_id], [market_id], [title], [price], [attributes]) VALUES (2, 1, '20000 GC', 200, 'test, test'); GO
INSERT INTO [vpanel_market_item] ([item_id], [market_id], [title], [price], [attributes]) VALUES (3, 1, '40000 GC', 300, 'test, test'); GO
INSERT INTO [vpanel_market_item] ([item_id], [market_id], [title], [price], [attributes]) VALUES (4, 2, '7 GÜN VIP', 30, 'test, test'); GO
INSERT INTO [vpanel_market_item] ([item_id], [market_id], [title], [price], [attributes]) VALUES (5, 2, '15 GÜN VIP', 60, 'test, test'); GO
INSERT INTO [vpanel_market_item] ([item_id], [market_id], [title], [price], [attributes]) VALUES (6, 2, '30 GÜN VIP', 100, 'test, test'); GO
INSERT INTO [vpanel_market_item] ([item_id], [market_id], [title], [price], [attributes]) VALUES (7, 1, '20000 GCc', 200, 'test, test'); GO
INSERT INTO [vpanel_market_item] ([item_id], [market_id], [title], [price], [attributes]) VALUES (8, 1, '20000 GC', 200, 'test, test'); GO
INSERT INTO [vpanel_news] ([news_id], [tags], [description], [title], [date_added], [image]) VALUES (1, ' HAUNTZ, colorado, optimizasyon, fps', 'Colorado haritasında oluşan performans düşüklüğü ve diğer hatalar giderildi!', 'Colorado FPS Optmizasyonu!', '2023-09-04 03:07:44.000', 'game-bloodborne-500x375.jpg'); GO
INSERT INTO [vpanel_news] ([news_id], [tags], [description], [title], [date_added], [image]) VALUES (2, 'inferno, hauntz, game, fix', 'Inferno haritasında parlaklık yükseltildi', 'Inferno Haritası Aydınlandı!', '2023-09-03 03:08:35.000', 'game-bloodborne-500x375.jpg'); GO
INSERT INTO [vpanel_news] ([news_id], [tags], [description], [title], [date_added], [image]) VALUES (3, 'silah, modelleme, hauntz', 'Görünmeyen modeller, havada görünen kabzalar ve çözünürlük hataları giderildi!', 'Silahlar Modelleri Düzeltildi!', '2023-09-02 03:08:55.000', 'game-bloodborne-500x375.jpg'); GO
INSERT INTO [vpanel_news] ([news_id], [tags], [description], [title], [date_added], [image]) VALUES (4, 'Test', 'test', 'test', '2023-09-01 03:09:11.000', 'game-bloodborne-500x375.jpg'); GO
INSERT INTO [vpanel_settings] ([sitename], [logo], [description], [discord], [youtube]) VALUES ('HAUNTZ GAME', 'logo.png', 'hauntz game', 'https://discord.gg/5SdUS8TGdf', '#'); GO
