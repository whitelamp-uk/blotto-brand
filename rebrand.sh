
if [ ! "$1" ]
then
    echo "First argument is, for example, your-brand-name"
    exit
fi

# Where are we?
wd="$(pwd)"

# Descend into project
cd "$(dirname $0)"
rm -rf .git
rm LICENSE
echo "\nblotto-$1\n\n" > README.md
mv blotto-brand.sublime-project blotto-$1.sublime-project

# Ascend into parent directory
cd ..
mv blotto-brand blotto-$1
ln -s blotto-$1 blotto-brand

# Return to where we started
cd "$wd"


