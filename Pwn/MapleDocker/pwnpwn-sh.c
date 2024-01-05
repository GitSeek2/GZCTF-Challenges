#include <stdio.h>
#include <unistd.h>
char sh[]="/bin/sh";
int init_func() {
    setvbuf(stdin,0,2,0);
    setvbuf(stdout,0,2,0);
    setvbuf(stderr,0,2,0);
    return 0;
}

int func(char *cmd){
    system(sh);
    return 0;
}

int main() {
    init_func();
    volatile int (*fp)();
    fp=0;
    int a;
    // char a[4] = {};
    // char b[0x10] = {};
        puts("input:");
        gets(&a);
        // printf(&a)p;
        if(fp){
            fp();
        }
    return 0;
}
