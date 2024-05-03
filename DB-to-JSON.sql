# Veritabanındaki bir talodaki tüm verileri tek bir hücrede JSON formatında çıktı vermesini sağlar.
SELECT CONCAT('[', GROUP_CONCAT(JSON_OBJECT('id', id, 'title', title, 'content', content)), ']') AS `output_json` FROM example;
