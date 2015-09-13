#!/bin/bash

if [ $# -eq 2 ]
then
    outfile=$2
elif [ $# -eq 1 ]
then
    outfile=`basename "$1" \.pdf`.pcl
else
    echo "Usage: `basename \"$0\"` input.pdf [output.pcl]" 1>&2
    exit 1
fi
exec gs -q -dNOPAUSE -dBATCH -P- -dSAFER -sDEVICE=pxlcolor "-sOutputFile=$outfile" -c save pop -f "$1"


smbclient //octa.edu/A4-4515X <octa-pass> -U <Roll-No> -W octa.edu -I 10.0.0.38 -c "print <filename>; exit;"