use lod_db;
INSERT INTO `dataset_2012` VALUES (36,'中村聡史','京都大学',1,'nakamura@dl.kuis.kyoto-u.ac.jp',1,'国会会議録データセット（対話コーパス）','http://www.dl.kuis.kyoto-u.ac.jp/~nakamura/gijiroku_20130122.tsv.gz','国会会議録システム（http://kokkai.ndl.go.jp/SENTAKU/index.htm）から衆議院，参議院，両院協議会の1947年から2012年末日まで65年にわたる会議録から，\r\n・発言日\r\n・会議録上の発言者名\r\n・名寄せした発言者名\r\n・名寄せした発言者の役職名\r\n・発言内容（句点までを1区切りの発言として扱っています）\r\n・会議録のURL\r\nをタブ区切りで整形したデータです．総発言数は約4840万（総発言長は約35億文字．展開後のファイルサイズは16GB程度）になります．\r\n会議録上の発言者名は略記されるうえ，元データはまったく構造化されていないベタ書きのHTMLデータ（空白や改行によりなんとなく構造化されています）であり，国会会議録は議事録作成者にかなり左右されることがあるため，名寄せでかなり工夫しています．\r\n実際には，会議録上の発言者名をもとに，会議録内で参加者一覧と思われる場所を発見し，会議録上の発言者名の部分一致で最適合する名前らしき部分を人物名として抜き出すようにしております．（元データ（特に参加者一覧）はかなり作成者依存なので一度ご覧になる事をおすすめします）．\r\nなお，一部会議録作成者のタイプミスなどによって正常に名寄せできていないものもあります．ただ，その数は総量から考えるととても少ないので，分析上無視出来るレベルであると考えています．','65年にも及ぶ長期的な対話コーパスとして利用可能であり，変化を知るという事に使えるのではと考えます．\r\nまた，誰と誰が会話し，どういう言葉が引き出されたのかなどを知ることが可能ですし，どういう役職の人がどのような発言をするのかなども知ることが可能です．\r\n下記は本コーパスを利用し，言語学，心理学の研究者と共同で研究を行った成果です．\r\n\r\n中村 聡史, 平田 佐智子, 秋田 喜美: 国会議事録コーパスを用いたオノマトペの通時的分析, 人工知能学会全国大会 2012, 1M1-OS-8a-7 (2012年6月).\r\n秋田 喜美, 中村 聡史, 小松 孝徳, 平田 佐智子: オノマトペのインタラクション性に関する量的考察, 人工知能学会全国大会 2012, 2N1-OS-8c-5 (2012年6月).\r\nKimi Akita, Satoshi Nakamura, Takanori Komatsu, Sachiko Hirata: A Quantitative Approach to Mimetic Diachrony, The 22nd Japanese/Korean Linguistics Conference (2012).\r\n\r\n他にも，情報化，国際化，機械化，自動化などの相関や，地震と津波の関係なども見ることが可能です．\r\n本コーパスを利用した新たなる研究や，面白いアプリケーション，可視化を期待しております．','','','by',NULL,'489cec910a3b3a823deb3db5a872c96dec456408','2013-01-29 11:08:55','','');
