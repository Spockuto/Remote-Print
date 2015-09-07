#!/bin/bash
smbclient //octa.edu/A4-4515X <octa-pass> -U <Roll-No> -W octa.edu -I 10.0.0.38 -c "print <filename>; exit;"