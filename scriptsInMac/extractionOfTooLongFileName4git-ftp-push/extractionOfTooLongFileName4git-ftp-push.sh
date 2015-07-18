#! /bin/sh
find ../../previous | tee ./repofiles.list
find ../../previous type f | sed 's!^.*/!!' | tee ./repofiles.filenameOnly.list
IFS=$'\n'; for length in `cat repofiles.filenameOnly.list`; do echo $length | wc -m ; done | tee ./repofiles.count.list
IFS=$'\n'; for length in `cat repofiles.count.list | sed -e 's/ //g'`; do echo $length | wc -m; done | tee ./repofiles.count.char.list
paste repofiles.count.char.list repofiles.count.list repofiles.filenameOnly.list repofiles.list | tee ./repofiles.count.paseted.list
sed -e 's/^       //g' ./repofiles.count.paseted.list | grep ^4 | cut -f 4 | tee ./repofiles.tooLongFileName.list
IFS=$'\n'; for length in `cat repofiles.tooLongFileName.list`; do rsync -auv --progress --partial --append $length ./backupTooLongNameFiles ; done
IFS=$'\n'; for length in `cat repofiles.tooLongFileName.list`; do rm ; done
mv ../../previous/blog/wp-content/uploads/ ./backupTooLongNameFiles
mv ../../previous/challenge2012/dat/tmp/ ./backupTooLongNameFiles
